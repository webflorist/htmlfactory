<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AcceptAttribute;

trait AllowsAcceptAttribute
{

    /**
     * Set value of HTML-attribute 'accept'.
     *
     * @param string $value
     * @return $this
     */
    public function accept(string $value)
    {
        $this->attributes->establish(AcceptAttribute::class)->addValue($value);
        return $this;
    }

}