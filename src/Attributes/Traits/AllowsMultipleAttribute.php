<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MultipleAttribute;

trait AllowsMultipleAttribute
{

    /**
     * Set value of HTML-attribute 'multiple'.
     *
     * The multiple attribute is a boolean attribute.
     * When present, it specifies that the user is allowed to enter/select more than one value.
     *
     * @param bool $multiple
     * @return $this
     */
    public function multiple(bool $multiple = true)
    {
        $this->attributes->establish(MultipleAttribute::class)->setValue($multiple);
        return $this;
    }

}