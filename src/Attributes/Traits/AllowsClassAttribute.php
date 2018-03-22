<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsClassAttribute
{

    /**
     * Add a HTML-class to element.
     *
     * @param string $class
     * @return $this
     */
    public function addClass(string $class)
    {
        $this->attributes->establish('class')->addValue($class);
        return $this;
    }

}