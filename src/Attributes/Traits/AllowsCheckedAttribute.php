<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\CheckedAttribute;

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