<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('autofocus')->setValue($autofocus);
        return $this;
    }

}