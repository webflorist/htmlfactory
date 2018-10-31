<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MethodAttribute;

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
        $this->attributes->establish(MethodAttribute::class)->setValue(strtoupper($method));
        return $this;
    }

}