<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\AriaInvalidAttribute;

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
     * @param string|\Closure $invalid
     * @return $this
     */
    public function ariaInvalid($invalid = 'true')
    {
        $this->attributes->establish(AriaInvalidAttribute::class)->setValue($invalid);
        return $this;
    }

}