<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\ValueAttribute;

trait AllowsValueAttribute
{

    /**
     * Set value of HTML-attribute 'value'.
     *
     * @param string|\Closure $value
     * @return $this
     */
    public function value($value)
    {
        $this->attributes->establish(ValueAttribute::class)->setValue($value);
        return $this;
    }

}