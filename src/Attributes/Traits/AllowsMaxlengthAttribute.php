<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MaxlengthAttribute;

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