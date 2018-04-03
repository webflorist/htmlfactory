<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsMinAttribute
{

    /**
     * Set value of HTML-attribute 'min'.
     *
     * @param int|string $min
     * @return $this
     */
    public function min($min)
    {
        $this->attributes->establish('min')->setValue($min);
        return $this;
    }

}