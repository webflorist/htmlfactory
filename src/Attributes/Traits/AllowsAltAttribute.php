<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('alt')->setValue($text);
        return $this;
    }

}