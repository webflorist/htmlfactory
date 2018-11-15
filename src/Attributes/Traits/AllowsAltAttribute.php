<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AltAttribute;

trait AllowsAltAttribute
{

    /**
     * Set value of HTML-attribute 'alt'.
     *
     * @param string|\Closure $text
     * @return $this
     */
    public function alt($text)
    {
        $this->attributes->establish(AltAttribute::class)->setValue($text);
        return $this;
    }

}