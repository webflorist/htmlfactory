<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\AcceptCharsetAttribute;

trait AllowsAcceptCharsetAttribute
{

    /**
     * Set value of HTML-attribute 'accept-charset'.
     *
     * @param string|\Closure $charset
     * @return $this
     */
    public function acceptCharset($charset)
    {
        $this->attributes->establish(AcceptCharsetAttribute::class)->setValue($charset);
        return $this;
    }

}