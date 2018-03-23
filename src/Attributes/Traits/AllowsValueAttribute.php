<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsValueAttribute
{

    /**
     * Set value of HTML-attribute 'value'.
     *
     * @param string $value
     * @return $this
     */
    public function value($value)
    {
        $this->attributes->establish('value')->setValue($value);
        return $this;
    }

}