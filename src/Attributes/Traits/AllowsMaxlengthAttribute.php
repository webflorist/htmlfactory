<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsMaxlengthAttribute
{

    /**
     * Set value of HTML-attribute 'maxlength'.
     *
     * @param int $maxlength
     * @return $this
     */
    public function maxlength(int $maxlength)
    {
        $this->attributes->establish('maxlength')->setValue($maxlength);
        return $this;
    }

}