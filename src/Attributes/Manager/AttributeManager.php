<?php

namespace Nicat\HtmlFactory\Attributes\Manager;

use Nicat\HtmlFactory\Attributes\Abstracts\Attribute;
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
     * AttributeManager constructor.
     *
     * @param Element $element
     */
    public function __construct(Element $element)
    {
        $this->element = $element;
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
    public function establish(string $attributeClass, array $attributeParams=[]): Attribute
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
     * @param bool $prefixSpace: prefixes the generated string with a space-character.
     * @return string
     */
    public function render($prefixSpace=true)
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