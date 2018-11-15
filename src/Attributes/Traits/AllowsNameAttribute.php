<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\NameAttribute;

trait AllowsNameAttribute
{

    /**
     * Set value of HTML-attribute 'name'.
     *
     * @param string|\Closure $name
     * @return $this
     */
    public function name($name)
    {
        $this->attributes->establish(NameAttribute::class)->setValue($name);
        return $this;
    }

}