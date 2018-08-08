<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsWidthAttribute
{

    /**
     * Set value of HTML-attribute 'width'.
     *
     * @param int $width
     * @return $this
     */
    public function width(int $width)
    {
        $this->attributes->establish('width')->setValue($width);
        return $this;
    }

}