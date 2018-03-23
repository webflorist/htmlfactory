<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsDataAttribute
{

    /**
     * Sets a HTML-data-attribute.
     *
     * @param string $suffix
     * @param string|bool $value
     * @return $this
     */
    public function data(string $suffix, $value=true)
    {
        $this->attributes->establish('data-' . $suffix)->setValue($value);
        return $this;
    }

}