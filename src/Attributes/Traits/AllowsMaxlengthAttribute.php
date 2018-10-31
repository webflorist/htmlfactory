<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MaxlengthAttribute;

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
        $this->attributes->establish(MaxlengthAttribute::class)->setValue($maxlength);
        return $this;
    }

}