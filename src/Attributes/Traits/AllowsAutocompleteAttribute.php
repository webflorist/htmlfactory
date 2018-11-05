<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AutocompleteAttribute;

trait AllowsAutocompleteAttribute
{

    /**
     * Set value of HTML-attribute 'autocomplete'.
     *
     * @param bool|\Closure $autocomplete
     * @return $this
     */
    public function autocomplete($autocomplete = true)
    {
        $autocomplete = ($autocomplete ? 'on' : 'off');
        $this->attributes->establish(AutocompleteAttribute::class)->setValue($autocomplete);
        return $this;
    }

}