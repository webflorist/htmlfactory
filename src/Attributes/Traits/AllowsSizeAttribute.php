<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\SizeAttribute;

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
        $this->attributes->establish(SizeAttribute::class)->setValue($size);
        return $this;
    }

}