<?php

namespace Nicat\HtmlFactory\Attributes\Abstracts;

/**
 * Abstract base-class for boolean HTML-attributes (e.g. 'selected').
 *
 * Class BooleanAttribute
 * @package Nicat\HtmlFactory
 */
abstract class BooleanAttribute extends Attribute
{

    /**
     * Boolean value.
     *
     * @var null|bool
     */
    private $value = null;

    /**
     * Returns the rendered value.
     *
     * @return bool
     */
    public function getValue()
    {
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
        if ($this->value === true) {
            return $this->getName();
        }
        return '';
    }

    /**
     * Set the attribute's value.
     *
     * @param bool $value
     */
    public function setValue(bool $value = true)
    {
        $this->value = $value;
    }
}