<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsStyleAttribute
{

    /**
     * Add a CSS-style to element.
     *
     * @param string $style
     * @return $this
     */
    public function addStyle(string $style)
    {
        $this->attributes->establish('style')->addValue($style);
        return $this;
    }

}