<?php

namespace Webflorist\HtmlFactory\Decorators\Abstracts;

use Webflorist\HtmlFactory\Elements\Abstracts\Element;

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
     * Returns an array of frontend-framework-ids, this decorator is specific for.
     * Returning an empty array means all frameworks are supported.
     *
     * @return string[]
     */
    public abstract static function getSupportedFrameworks(): array;

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