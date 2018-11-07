<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MinAttribute;

trait AllowsMinAttribute
{

    /**
     * Set value of HTML-attribute 'min'.
     *
     * @param int|string|\Closure $min
     * @return $this
     */
    public function min($min)
    {
        $this->attributes->establish(MinAttribute::class)->setValue($min);
        return $this;
    }

}