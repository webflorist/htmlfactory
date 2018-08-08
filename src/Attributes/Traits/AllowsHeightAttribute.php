<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('height')->setValue($height);
        return $this;
    }

}