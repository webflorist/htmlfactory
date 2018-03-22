<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsAcceptAttribute
{

    /**
     * Set value of HTML-attribute 'accept'.
     *
     * @param string $value
     * @return $this
     */
    public function accept(string $value)
    {
        $this->attributes->establish('accept')->addValue($value);
        return $this;
    }

}