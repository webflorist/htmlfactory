<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsDataAttribute
{

    /**
     * Sets a HTML-data-attribute.
     *
     * @param string $suffix
     * @param string $value
     * @return $this
     */
    public function data(string $suffix, string $value)
    {
        $this->attributes->establish('data-' . $suffix)->setValue($value);
        return $this;
    }

}