<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\DataAttribute;

trait AllowsDataAttribute
{

    /**
     * Sets a HTML-data-attribute.
     *
     * @param string $suffix
     * @param string|bool|\Closure $value
     * @return $this
     */
    public function data(string $suffix, $value=true)
    {
        $this->attributes->establish(DataAttribute::class, [$suffix])->setValue($value);
        return $this;
    }

}