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
     * @var string[]|\Closure[]
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
        if (count($this->values) > 0) {

            $values = $this->values;
            foreach ($values as $key => $value) {
                if ($this->isClosure($value)) {
                    $values[$key] = $this->callClosure($value);
                }
            }

            return trim(implode($this->divider, array_unique($values)));
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
        return strlen($this->getValue()) > 0;
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
     * @param string|\Closure $value
     */
    public function addValue($value)
    {
        // Closures are simply added to the values-array.
        if ($this->isClosure($value)) {
            $this->values[] = $value;
            return;
        }

        // Handle strings.
        if (strlen($value)>0) {
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
}