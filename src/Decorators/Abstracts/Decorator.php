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
     * Applies this decorator immediately
     * before it's parent (instead of after).
     * Only relevant, if $this->getParentDecorator()
     * actually returns a parent.
     * 
     * TODO: Make this work.
     *
     * @var bool
     */
    protected $applyBeforeParent = false;    

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
    
    /**
     * Overwrite to return Full Qualified Class Name
     * of Parent Decorator (must extend Decorator class).
     * $this decorator is applied immediately after it's parent,
     * (or before, if $applyBeforeParent is set to true).
     *
     * TODO: Make this work.
     *
     */
    public function getParentDecorator()
    {
        return null;
    }

}
