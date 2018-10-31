<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\DisabledAttribute;

trait AllowsDisabledAttribute
{

    /**
     * Set value of HTML-attribute 'disabled'.
     *
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled = true)
    {
        $this->attributes->establish(DisabledAttribute::class)->setValue($disabled);
        return $this;
    }

}