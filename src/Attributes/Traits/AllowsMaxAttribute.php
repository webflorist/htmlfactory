<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('max')->setValue($max);
        return $this;
    }

}