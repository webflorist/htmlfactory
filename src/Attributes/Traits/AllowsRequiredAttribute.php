<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\RequiredAttribute;

trait AllowsRequiredAttribute
{

    /**
     * Set value of HTML-attribute 'required'.
     *
     * @param bool|\Closure $required
     * @return $this
     */
    public function required($required = true)
    {
        $this->attributes->establish(RequiredAttribute::class)->setValue($required);
        return $this;
    }

}