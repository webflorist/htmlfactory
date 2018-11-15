<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\MethodAttribute;

trait AllowsMethodAttribute
{

    /**
     * Set value of HTML-attribute 'method'.
     *
     * @param string|\Closure $method
     * @return $this
     */
    public function method($method)
    {
        $this->attributes->establish(MethodAttribute::class)->setValue(strtoupper($method));
        return $this;
    }

}