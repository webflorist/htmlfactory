<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\HeightAttribute;

trait AllowsHeightAttribute
{

    /**
     * Set value of HTML-attribute 'height'.
     *
     * @param int $height
     * @return $this
     */
    public function height(int $height)
    {
        $this->attributes->establish(HeightAttribute::class)->setValue($height);
        return $this;
    }

}