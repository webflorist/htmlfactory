<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\MaxlengthAttribute;

trait AllowsMaxlengthAttribute
{

    /**
     * Set value of HTML-attribute 'maxlength'.
     *
     * @param int|\Closure $maxlength
     * @return $this
     */
    public function maxlength($maxlength)
    {
        $this->attributes->establish(MaxlengthAttribute::class)->setValue($maxlength);
        return $this;
    }

}