<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsMaxAttribute
{

    /**
     * Set value of HTML-attribute 'max'.
     *
     * @param int $max
     * @return $this
     */
    public function max(int $max)
    {
        $this->attributes->establish('max')->setValue($max);
        return $this;
    }

}