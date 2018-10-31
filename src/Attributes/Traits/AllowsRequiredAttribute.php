<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\RequiredAttribute;

trait AllowsRequiredAttribute
{

    /**
     * Set value of HTML-attribute 'required'.
     *
     * @param bool $required
     * @return $this
     */
    public function required(bool $required = true)
    {
        $this->attributes->establish(RequiredAttribute::class)->setValue($required);
        return $this;
    }

}