<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AutofocusAttribute;

trait AllowsAutofocusAttribute
{

    /**
     * Set value of HTML-attribute 'autofocus'.
     *
     * @param bool $autofocus
     * @return $this
     */
    public function autofocus(bool $autofocus = true)
    {
        $this->attributes->establish(AutofocusAttribute::class)->setValue($autofocus);
        return $this;
    }

}