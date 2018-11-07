<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\DisabledAttribute;

trait AllowsDisabledAttribute
{

    /**
     * Set value of HTML-attribute 'disabled'.
     *
     * @param bool|\Closure $disabled
     * @return $this
     */
    public function disabled($disabled = true)
    {
        $this->attributes->establish(DisabledAttribute::class)->setValue($disabled);
        return $this;
    }

}