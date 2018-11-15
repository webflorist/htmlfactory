<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsMethodAttribute
{

    /**
     * Set value of HTML-attribute 'method'.
     *
     * @param string $method
     * @return $this
     */
    public function method(string $method)
    {
        $this->attributes->establish('method')->setValue(strtoupper($method));
        return $this;
    }

}