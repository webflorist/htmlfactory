<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('required')->setValue($required);
        return $this;
    }

}