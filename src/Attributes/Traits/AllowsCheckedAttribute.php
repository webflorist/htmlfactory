<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\CheckedAttribute;

trait AllowsCheckedAttribute
{

    /**
     * Set value of HTML-attribute 'checked'.
     *
     * @param bool|\Closure $checked
     * @return $this
     */
    public function checked($checked = true)
    {
        $this->attributes->establish(CheckedAttribute::class)->setValue($checked);
        return $this;
    }

}