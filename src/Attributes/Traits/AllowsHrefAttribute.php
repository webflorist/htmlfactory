<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\HrefAttribute;

trait AllowsHrefAttribute
{

    /**
     * Set value of HTML-attribute 'href'.
     *
     * @param string|\Closure $href
     * @return $this
     */
    public function href($href)
    {
        $this->attributes->establish(HrefAttribute::class)->setValue($href);
        return $this;
    }

}
