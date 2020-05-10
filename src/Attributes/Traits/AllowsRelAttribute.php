<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\RelAttribute;

trait AllowsRelAttribute
{

    /**
     * Set value of HTML-attribute 'rel'.
     *
     * @param string|\Closure $relationship
     * @return $this
     */
    public function rel($relationship)
    {
        $this->attributes->establish(RelAttribute::class)->setValue($relationship);
        return $this;
    }

}
