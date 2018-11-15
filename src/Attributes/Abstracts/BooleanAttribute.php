<?php

namespace Webflorist\HtmlFactory\Attributes\Abstracts;

/**
 * Abstract base-class for boolean HTML-attributes (e.g. 'selected').
 *
 * Class BooleanAttribute
 * @package Webflorist\HtmlFactory
 */
abstract class BooleanAttribute extends Attribute
{

    /**
     * Boolean value.
     *
     * @var null|bool|\Closure
     */
    private $value = null;

    /**
     * Returns the rendered value.
     *
     * @return bool
     */
    public function getValue()
    {
        if ($this->isClosure($this->value)) {
            return $this->callClosure($this->value);
        }
        return $this->value;
    }

    /**
     * Is this attribute set?
     *
     * @return bool
     */
    public function isSet(): bool
    {
        return !is_null($this->value);
    }

    /**
     * Renders the complete attribute.
     *
     * @return string
     */
    public function render(): string
    {
        if ($this->getValue() === true) {
            return $this->getName();
        }
        return '';
    }

    /**
     * Set the attribute's value.
     *
     * @param bool|\Closure $value
     */
    public function setValue($value = true)
    {
        $this->value = $value;
    }
}