<?php

namespace Nicat\HtmlFactory\Attributes\Abstracts;

/**
 * Abstract base-class for HTML-attributes,
 * that contain lists of values (e.g. 'class').
 *
 * Class ListAttribute
 * @package Nicat\HtmlFactory
 */
abstract class ListAttribute extends Attribute
{

    /**
     * Array of values.
     *
     * @var string[]
     */
    private $values = [];

    /**
     * The divider used to divide multiple values.
     * (e.g. ' ' for class or ';' for style)
     *
     * @var string
     */
    protected $divider = ' ';

    /**
     * Returns the rendered value.
     *
     * @return string
     */
    public function getValue()
    {
        if ($this->isSet()) {
            return implode($this->divider, $this->values);
        }
        return null;
    }

    /**
     * Is this attribute set?
     *
     * @return bool
     */
    public function isSet(): bool
    {
        return count($this->values) > 0;
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
     * Adds a value.
     *
     * @param string $value
     */
    public function addValue(string $value)
    {
        // If multiple values are stated, we try to explode by the attribute's divider
        // and add each value separately.
        if (strpos($value, $this->divider) !== false) {
            foreach (explode($this->divider, $value) as $singleValue) {
                $this->addValue($singleValue);
            }
            return;
        }

        // If a value does not exist yet, we add it.
        if (array_search($value, $this->values) === false) {
            $this->values[] = $value;
        }
    }
}