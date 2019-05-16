<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\ClassAttribute;

trait AllowsClassAttribute
{

    /**
     * Add a HTML-class to element.
     *
     * @param string|\Closure $class
     * @return $this
     */
    public function addClass($class)
    {
        $this->attributes->establish(ClassAttribute::class)->addValue($class);
        return $this;
    }

    /**
     * Add an array of HTML-classes to element.
     *
     * @param array $classes
     * @return $this
     */
    public function addClasses(array $classes)
    {
        foreach ($classes as $class) {
            $this->addClass($class);
        }
        return $this;
    }

}