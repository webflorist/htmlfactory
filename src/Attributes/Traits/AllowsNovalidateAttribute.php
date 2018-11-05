<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\NovalidateAttribute;

trait AllowsNovalidateAttribute
{

    /**
     * Set value of HTML-attribute 'novalidate'.
     *
     * @param bool|\Closure $novalidate
     * @return $this
     */
    public function novalidate($novalidate = true)
    {
        $this->attributes->establish(NovalidateAttribute::class)->setValue($novalidate);
        return $this;
    }

}