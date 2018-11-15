<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('multiple')->setValue($multiple);
        return $this;
    }

}