<?php

namespace Webflorist\HtmlFactory\Attributes\Manager;

use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Attributes\Abstracts\Attribute;
use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;

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
     * @param string $attributeClass
     * @param array $attributeParams
     * @return Attribute
     */
    public function establish(string $attributeClass, array $attributeParams = []): Attribute
    {
        /** @var Attribute $attribute */
        $attribute = new $attributeClass(...$attributeParams);
        $attribute->setElement($this->element);
        $attributeName = $attribute->getName();

        if (!isset($this->attributes[$attributeName])) {
            $this->attributes[$attributeName] = $attribute;
        }

        return $this->attributes[$attributeName];
    }

    /**
     * Renders all attributes.
     *
     * @param bool $prefixSpace : prefixes the generated string with a space-character.
     * @return string
     */
    public function render($prefixSpace = true)
    {
        $html = '';
        foreach ($this->attributes as $attribute) {
            if ($attribute->isSet()) {
                $html .= $attribute->render() . ' ';
            }
        }

        $html = trim($html);

        if ($prefixSpace && (strlen($html) > 0)) {
            $html = ' ' . $html;
        }

        return $html;
    }

    public function toArray($htmlOnly=false)
    {
        $attributes = [];
        foreach ($this->attributes as $attribute) {
            if ($attribute->isSet()) {
                if ($htmlOnly == false || !is_a($attribute, VueDirective::class)) {
                    $attributes[$attribute->getName()] = $attribute->getValue();
                }
            }
        }
        return $attributes;
    }

    public function toJson($htmlOnly=false)
    {
        return json_encode($this->toArray($htmlOnly));
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

    /**
     * Is an attribute allowed for $this->element?
     *
     * @param string $attributeName
     * @return bool
     */
    public function isAllowed(string $attributeName): bool
    {

        // Vue-directives are always allowed.
        if (self::isVueDirective($attributeName)) {
            return true;
        }

        // Data-attributes are also always allowed.
        if (self::isDataAttribute($attributeName)) {
            return true;
        }

        return array_search($attributeName, $this->allowedAttributes) !== false;
    }

    /**
     * Evaluates which HTML-attributes are allowed for $this->element
     * and fills $this->allowedAttributes accordingly.
     */
    private function evaluateAllowedAttributes()
    {
        $elementTraits = self::getClassTraits(get_class($this->element));
        $traitPrefix = 'Webflorist\HtmlFactory\Attributes\Traits\Allows';
        $traitSuffix = 'Attribute';
        foreach ($elementTraits as $traitClass) {
            if (strpos($traitClass, $traitPrefix) === 0) {
                $this->allowedAttributes[] = Str::kebab(Str::before(Str::after($traitClass, $traitPrefix), $traitSuffix));
            }
        }
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
     * Is an attribute allowed for $this->element?
     * Is the attribute a Vue-directive (=does it start with a 'v-');
     *
     * @param string $attributeName
     * @return bool
     */
    private static function isVueDirective(string $attributeName): bool
    {
        return substr($attributeName, 0, 2) === 'v-';
    }

    /**
     * Is the attribute a data-attribute (=does it start with a 'data-');
     *
     * @param string $attributeName
     * @return bool
     */
    private static function isDataAttribute(string $attributeName): bool
    {
        return substr($attributeName, 0, 5) === 'data-';
    }

}