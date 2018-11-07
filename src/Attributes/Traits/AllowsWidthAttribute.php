<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\WidthAttribute;

trait AllowsWidthAttribute
{

    /**
     * Set value of HTML-attribute 'width'.
     *
     * @param int|\Closure $width
     * @return $this
     */
    public function width($width)
    {
        $this->attributes->establish(WidthAttribute::class)->setValue($width);
        return $this;
    }

}