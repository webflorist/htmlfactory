<?php

namespace Webflorist\HtmlFactory\Attributes\Abstracts;

use Webflorist\HtmlFactory\Exceptions\ValueNotAllowedException;

/**
 * Abstract base-class for regular HTML-attributes,
 * that contain a string (e.g. 'id').
 *
 * Class StringAttribute
 * @package Webflorist\HtmlFactory
 */
abstract class StringAttribute extends Attribute
{

    /**
     * The attribute's string value
     *
     * @var null|string|\Closure
     */
    protected $value = null;

    /**
     * Returns the rendered value.
     *
     * @return string|null
     */
    public function getValue()
    {
        if ($this->isClosure($this->value)) {
            return $this->callClosure($this->value);
        }
        return $this->value;
    }

    /**
     * Return array of allowed values.
     * Overwrite, if attribute should only allow specific values.
     *
     * @return string[]
     */
    protected function getAllowedValues() : array
    {
        return [];
    }

    /**
     * Is this attribute set?
     *
     * @return bool
     */
    public function isSet(): bool
    {
        return !is_null($this->getValue());
    }

    /**
     * Renders the complete attribute.
     *
     * @return string
     */
    public function render(): string
    {
        if ($this->isSet()) {
            return $this->getName() . '="' . e($this->getValue()) . '"';
        }
        return '';
    }

    /**
     * Sets the attribute's value.
     *
     * @param string|\Closure $value
     * @throws ValueNotAllowedException
     */
    public function setValue($value)
    {
        $valueToCheck = $value;
        if ($this->isClosure($value)) {
            $valueToCheck = $this->callClosure($value);
        }
        if (!$this->valueIsAllowed($valueToCheck)) {
            throw new ValueNotAllowedException('Value "'.$valueToCheck.'" is not allowed for attribute "'.$this->getName().'".');
        }
        $this->value = $value;
    }

    /**
     * Checks, if a value is present in $this->getAllowedValues()
     * (only applicable for attributes with a specific set of allowed values).
     *
     * @param string $value
     * @return bool
     */
    protected function valueIsAllowed($value) : bool
    {
        // A null-value is always allowed, since it unsets this attribute.
        if (is_null($value)) {
            return true;
        }

        $allowedValues = $this->getAllowedValues();
        if (!is_null($allowedValues) && (count($allowedValues) > 0)) {
            return array_search($value,$allowedValues) !== false;
        }

        return true;
    }

}