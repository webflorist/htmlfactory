<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\AutofocusAttribute;

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