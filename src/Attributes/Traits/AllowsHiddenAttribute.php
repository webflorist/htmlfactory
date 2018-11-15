<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\HiddenAttribute;

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