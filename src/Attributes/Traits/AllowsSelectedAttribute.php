<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\SelectedAttribute;

trait AllowsSelectedAttribute
{

    /**
     * Set value of HTML-attribute 'selected'.
     *
     * @param bool|\Closure $selected
     * @return $this
     */
    public function selected($selected = true)
    {
        $this->attributes->establish(SelectedAttribute::class)->setValue($selected);
        return $this;
    }

}