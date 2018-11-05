<?php

namespace Nicat\HtmlFactory\Attributes\Abstracts;

use Nicat\HtmlFactory\Elements\Abstracts\Element;

/**
 * Abstract base-class for all HTML-attributes.
 *
 * Class Attribute
 * @package Nicat\HtmlFactory
 */
abstract class Attribute
{

    /**
     * The HTML-element this attribute is for.
     *
     * @var Element
     */
    protected $element;

    /**
     * Sets the HTML-element this attribute is used for.
     *
     * @param Element $element
     */
    public function setElement(Element $element)
    {
        $this->element = $element;
    }

    /**
     *
     * Checks, if $value is a Closure.
     *
     * @param $value
     * @return bool
     */
    function isClosure($value) {
        return is_object($value) && ($value instanceof \Closure);
    }

    /**
     * Calls a closure used to store a value.
     *
     * @param $value
     * @return mixed
     */
    protected function callClosure(\Closure $value)
    {
        return call_user_func_array($value, ['element' => $this->element]);
    }

    /**
     * Returns the name of the attribute.
     *
     * @return string
     */
    abstract public function getName(): string;

    /**
     * Returns the attribute's (rendered) value.
     *
     * @return mixed
     */
    abstract public function getValue();

    /**
     * Is this attribute set?
     *
     * @return bool
     */
    abstract public function isSet(): bool;

    /**
     * Renders the attribute.
     *
     * @return string
     */
    abstract public function render(): string;

}