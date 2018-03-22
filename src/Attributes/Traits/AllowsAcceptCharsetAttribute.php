<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsAcceptCharsetAttribute
{

    /**
     * Set value of HTML-attribute 'accept-charset'.
     *
     * @param string $charset
     * @return $this
     */
    public function acceptCharset(string $charset)
    {
        $this->attributes->establish('accept-charset')->setValue($charset);
        return $this;
    }

}