<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\SizeAttribute;

trait AllowsSizeAttribute
{

    /**
     * Set value of HTML-attribute 'size'.
     *
     * @param int|\Closure $size
     * @return $this
     */
    public function size($size)
    {
        $this->attributes->establish(SizeAttribute::class)->setValue($size);
        return $this;
    }

}