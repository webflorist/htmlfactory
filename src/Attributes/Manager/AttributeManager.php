<?php

namespace Nicat\HtmlFactory\Attributes\Manager;

use Nicat\HtmlFactory\Attributes\Abstracts\Attribute;
use Nicat\HtmlFactory\Exceptions\AttributeNotAllowedException;
use Nicat\HtmlFactory\Exceptions\AttributeNotFoundException;
use Nicat\HtmlFactory\Elements\Abstracts\Element;

class AttributeManager
{

    /**
     * The list of attributes.
     *
     * @var Attribute[]
     */
    protected $attributes = [];

    /**
     * The HTML-element the attributes are for.
     *
     * @var Element
     */
    protected $element;

    /**
     * Array of attributes, that are allowed for $this->element.
     *
     * @var string[]
     */
    protected $allowedAttributes;

    /**
     * AttributeManager constructor.
     *
     * @param Element $element
     */
    public function __construct(Element $element)
    {
        $this->element = $element;

        $this->evaluateAllowedAttributes();
    }

    /**
     * Magic method to allow accessing of attribute's values via $this->attributeName.
     *
     * @param $attributeName
     * @return mixed
     */
    public function __get($attributeName)
    {
        return $this->getValue($attributeName);
    }

    /**
     * Returns an existing attribute by it's name.
     * If it does not exist yet, it is created, added to the collection and returned.
     *
     * @param string $attributeName
     * @return Attribute
     * @throws AttributeNotFoundException
     * @throws AttributeNotAllowedException
     */
    public function establish(string $attributeName): Attribute
    {

        if (!isset($this->attributes[$attributeName])) {
            $attribute = $this->init($attributeName);
            $this->attributes[$attribute->getName()] = $attribute;
        }

        return $this->attributes[$attributeName];
    }

    /**
     * Renders all attributes.
     *
     * @return string
     */
    public function render()
    {
        $html = '';
        foreach ($this->attributes as $attribute) {
            if ($attribute->isSet()) {
                $html .= $attribute->render() . ' ';
            }
        }
        if (strlen($html)>0) {
            $html = ' '.trim($html);
        }
        return $html;
    }

    /**
     * Initializes a new attribute-object from it's attribute-name.
     * Throws exception, if no corresponding class was found or the attribute is not allowed for $this->element.
     *
     * @param string $attributeName
     * @return Attribute
     * @throws AttributeNotFoundException
     * @throws AttributeNotAllowedException
     */
    private function init(string $attributeName): Attribute
    {

        // For data-attributes we extract the suffix and add it to $constructorParams.
        $constructorParams = [];
        if (strpos($attributeName, 'data-') === 0) {
            $constructorParams = [substr($attributeName, 5)];
            $attributeName = 'data';
        }

        // We check, if the attribute is allowed for $this->element
        if (!$this->isAllowed($attributeName)) {
            throw new AttributeNotAllowedException('Attribute "' . $attributeName . '" is not allowed for element "' . get_class($this->element) . '".');
        }

        $attributeClass = self::getClassNameOfAttribute($attributeName);

        /** @var Attribute $attribute */
        $attribute = new $attributeClass(...$constructorParams);
        $attribute->setElement($this->element);

        return $attribute;
    }

    /**
     * Finds out full qualified class name for an HTML-attribute.
     * Throws exception, if no class was found.
     *
     * @param string $attributeName
     * @return string
     * @throws AttributeNotFoundException
     */
    private static function getClassNameOfAttribute(string $attributeName): string
    {
        // Attributes containing a hyphen (e.g. 'accept-charset')
        // must be converted to StudlyCase (e.g. 'AcceptCharset') for the class-name.
        if (strpos($attributeName, '-') !== false) {
            $attributeNameParts = explode('-', $attributeName);
            foreach ($attributeNameParts as $key => $namePart) {
                $attributeNameParts[$key] = ucfirst($namePart);
            }
            $attributeName = implode('', $attributeNameParts);
        }

        $attributeClass = 'Nicat\\HtmlFactory\\Attributes\\' . ucfirst($attributeName) . 'Attribute';

        if (!class_exists($attributeClass)) {
            throw new AttributeNotFoundException('No class for attribute "' . $attributeName . '" found.');
        }

        return $attributeClass;
    }

    /**
     * Gets all traits used by a class (as well as parent classes and other traits).
     *
     * @param string $class
     * @return array
     */
    private static function getClassTraits(string $class): array
    {
        $traits = [];

        // Get traits of all parent classes.
        do {
            $traits = array_merge(class_uses($class), $traits);
        } while ($class = get_parent_class($class));

        // Get traits of all parent traits.
        $traitsToSearch = $traits;
        while (!empty($traitsToSearch)) {
            $newTraits = class_uses(array_pop($traitsToSearch));
            $traits = array_merge($newTraits, $traits);
            $traitsToSearch = array_merge($newTraits, $traitsToSearch);
        };

        foreach ($traits as $trait => $same) {
            $traits = array_merge(class_uses($trait), $traits);
        }

        return array_unique($traits);
    }

    /**
     * Evaluates which HTML-attributes are allowed for $this->element
     * and fills $this->allowedAttributes accordingly.
     */
    private function evaluateAllowedAttributes()
    {
        $elementTraits = self::getClassTraits(get_class($this->element));
        $traitPrefix = 'Nicat\HtmlFactory\Attributes\Traits\Allows';
        $traitSuffix = 'Attribute';
        foreach ($elementTraits as $traitClass) {
            if (strpos($traitClass, $traitPrefix) === 0) {
                $this->allowedAttributes[] = kebab_case(str_before(str_after($traitClass, $traitPrefix), $traitSuffix));
            }
        }
    }

    /**
     * Is an attribute allowed for $this->element?
     *
     * @param string $attributeName
     * @return bool
     */
    public function isAllowed(string $attributeName): bool
    {
        return array_search($attributeName, $this->allowedAttributes) !== false;
    }

    /**
     * Get the (rendered) value of an attribute.
     * Returns null, if the attribute is not set.
     *
     * @param string $attributeName
     * @return mixed
     */
    public function getValue(string $attributeName)
    {
        if ($this->isSet($attributeName)) {
            return $this->attributes[$attributeName]->getValue();
        }
        return null;
    }

    /**
     * Is an attribute currently set?
     *
     * @param string $attributeName
     * @return bool
     */
    public function isSet(string $attributeName): bool
    {
        if (isset($this->attributes[$attributeName])) {
            return $this->attributes[$attributeName]->isSet();
        }
        return false;
    }

    /**
     * Remove a certain attribute.
     *
     * @param string $attributeName
     */
    public function remove(string $attributeName)
    {
        if (isset($this->attributes[$attributeName])) {
            unset($this->attributes[$attributeName]);
        }
    }
}