<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\MaxAttribute;

trait AllowsMaxAttribute
{

    /**
     * Set value of HTML-attribute 'max'.
     *
     * @param int|string $max
     * @return $this
     */
    public function max($max)
    {
        $this->attributes->establish(MaxAttribute::class)->setValue($max);
        return $this;
    }

}