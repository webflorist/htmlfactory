<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\PlaceholderAttribute;

trait AllowsPlaceholderAttribute
{

    /**
     * Set value of HTML-attribute 'placeholder'.
     *
     * @param string|\Closure $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->attributes->establish(PlaceholderAttribute::class)->setValue($placeholder);
        return $this;
    }

}