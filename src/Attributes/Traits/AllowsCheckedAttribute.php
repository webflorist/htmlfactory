<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\CheckedAttribute;

trait AllowsCheckedAttribute
{

    /**
     * Set value of HTML-attribute 'checked'.
     *
     * @param bool $checked
     * @return $this
     */
    public function checked(bool $checked = true)
    {
        $this->attributes->establish(CheckedAttribute::class)->setValue($checked);
        return $this;
    }

}