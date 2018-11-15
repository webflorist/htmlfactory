<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\SelectedAttribute;

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