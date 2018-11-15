<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\NameAttribute;

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