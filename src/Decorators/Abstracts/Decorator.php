<?php

namespace Nicat\HtmlFactory\Decorators\Abstracts;

use Nicat\HtmlFactory\Elements\Abstracts\Element;

abstract class Decorator
{

    /**
     * The element to be decorated.
     *
     * @var Element
     */
    protected $element;

    /**
     * Decorator constructor.
     *
     * @param Element $element
     */
    public function __construct(Element $element)
    {
        $this->element = $element;
    }

    /**
     * Returns the group-ID of this decorator.
     *
     * Returning null means this decorator will always be applied.
     *
     * @return string|null
     */
    public abstract static function getGroupId();

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public abstract static function getSupportedElements(): array;

    /**
     * Perform decorations on $this->element.
     */
    public abstract function decorate();

}