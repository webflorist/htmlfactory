<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsNovalidateAttribute
{

    /**
     * Set value of HTML-attribute 'novalidate'.
     *
     * @param bool $novalidate
     * @return $this
     */
    public function novalidate(bool $novalidate = true)
    {
        $this->attributes->establish('novalidate')->setValue($novalidate);
        return $this;
    }

}