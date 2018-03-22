<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('disabled')->setValue($disabled);
        return $this;
    }

}