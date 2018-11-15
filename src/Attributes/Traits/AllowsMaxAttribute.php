<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\MaxAttribute;

trait AllowsMaxAttribute
{

    /**
     * Set value of HTML-attribute 'max'.
     *
     * @param int|string|\Closure $max
     * @return $this
     */
    public function max($max)
    {
        $this->attributes->establish(MaxAttribute::class)->setValue($max);
        return $this;
    }

}