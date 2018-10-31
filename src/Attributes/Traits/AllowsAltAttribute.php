<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AltAttribute;

trait AllowsAltAttribute
{

    /**
     * Set value of HTML-attribute 'alt'.
     *
     * @param string $text
     * @return $this
     */
    public function alt(string $text)
    {
        $this->attributes->establish(AltAttribute::class)->setValue($text);
        return $this;
    }

}