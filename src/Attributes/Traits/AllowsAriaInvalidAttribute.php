<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AriaInvalidAttribute;

trait AllowsAriaInvalidAttribute
{

    /**
     * Add an id to the list of the HTML-attribute 'aria-invalid'
     *
     * The value can be:
     * - false:      No errors detected
     * - grammar:    A grammatical error has been detected.
     * - spelling:   A spelling error has been detected.
     * - true:       (default) The value has failed validation.
     *
     * @param string $invalid
     * @return $this
     */
    public function ariaInvalid(string $invalid = 'true')
    {
        $this->attributes->establish(AriaInvalidAttribute::class)->setValue($invalid);
        return $this;
    }

}