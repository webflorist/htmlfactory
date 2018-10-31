<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ValueAttribute;

trait AllowsValueAttribute
{

    /**
     * Set value of HTML-attribute 'value'.
     *
     * @param string $value
     * @return $this
     */
    public function value($value)
    {
        $this->attributes->establish(ValueAttribute::class)->setValue($value);
        return $this;
    }

}