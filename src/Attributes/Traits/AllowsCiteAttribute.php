<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;
use Webflorist\HtmlFactory\Attributes\CiteAttribute;

trait AllowsCiteAttribute
{

    /**
     * Set value of HTML-attribute 'cite'.
     *
     * @param string|\Closure $action
     * @return $this
     */
    public function cite($url)
    {
        $this->attributes->establish(CiteAttribute::class)->setValue($url);
        return $this;
    }

}