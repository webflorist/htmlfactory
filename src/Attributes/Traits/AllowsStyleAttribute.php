<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\StyleAttribute;

trait AllowsStyleAttribute
{

    /**
     * Add a CSS-style to element.
     *
     * @param string|\Closure $style
     * @return $this
     */
    public function addStyle($style)
    {
        $this->attributes->establish(StyleAttribute::class)->addValue($style);
        return $this;
    }

}