<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\StyleAttribute;

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
        $this->attributes->establish(StyleAttribute::class)->addValue($style);
        return $this;
    }

}