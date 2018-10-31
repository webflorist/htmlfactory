<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AcceptCharsetAttribute;

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
        $this->attributes->establish(AcceptCharsetAttribute::class)->setValue($charset);
        return $this;
    }

}