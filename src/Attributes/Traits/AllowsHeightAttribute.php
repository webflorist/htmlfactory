<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\HeightAttribute;

trait AllowsHeightAttribute
{

    /**
     * Set value of HTML-attribute 'height'.
     *
     * @param int|\Closure $height
     * @return $this
     */
    public function height($height)
    {
        $this->attributes->establish(HeightAttribute::class)->setValue($height);
        return $this;
    }

}