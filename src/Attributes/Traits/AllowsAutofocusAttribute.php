<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AutofocusAttribute;

trait AllowsAutofocusAttribute
{

    /**
     * Set value of HTML-attribute 'autofocus'.
     *
     * @param bool|\Closure $autofocus
     * @return $this
     */
    public function autofocus($autofocus = true)
    {
        $this->attributes->establish(AutofocusAttribute::class)->setValue($autofocus);
        return $this;
    }

}