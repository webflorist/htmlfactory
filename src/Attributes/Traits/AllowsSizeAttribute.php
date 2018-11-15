<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsSizeAttribute
{

    /**
     * Set value of HTML-attribute 'size'.
     *
     * @param int $size
     * @return $this
     */
    public function size(int $size)
    {
        $this->attributes->establish('size')->setValue($size);
        return $this;
    }

}