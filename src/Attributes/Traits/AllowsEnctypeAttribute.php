<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsEnctypeAttribute
{

    /**
     * Set value of HTML-attribute 'enctype'.
     *
     * @param string $enctype
     * @return $this
     */
    public function enctype(string $enctype)
    {
        $this->attributes->establish('enctype')->setValue($enctype);
        return $this;
    }

}