<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\HiddenAttribute;

trait AllowsHiddenAttribute
{

    /**
     * Set value of HTML-attribute 'hidden'.
     *
     * @param bool|\Closure $hidden
     * @return $this
     */
    public function hidden($hidden = true)
    {
        $this->attributes->establish(HiddenAttribute::class)->setValue($hidden);
        return $this;
    }

}