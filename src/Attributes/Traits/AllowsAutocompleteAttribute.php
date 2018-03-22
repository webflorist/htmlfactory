<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsAutocompleteAttribute
{

    /**
     * Set value of HTML-attribute 'autocomplete'.
     *
     * @param bool $autocomplete
     * @return $this
     */
    public function autocomplete(bool $autocomplete = true)
    {
        $autocomplete = ($autocomplete ? 'on' : 'off');
        $this->attributes->establish('autocomplete')->setValue($autocomplete);
        return $this;
    }

}