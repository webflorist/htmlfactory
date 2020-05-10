<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\HreflangAttribute;

trait AllowsHreflangAttribute
{

    /**
     * Set value of HTML-attribute 'hreflang'.
     *
     * @param string|\Closure $languageCode
     * @return $this
     */
    public function hreflang($languageCode)
    {
        $this->attributes->establish(HreflangAttribute::class)->setValue($languageCode);
        return $this;
    }

}
