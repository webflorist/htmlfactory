<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ClassAttribute;

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

}