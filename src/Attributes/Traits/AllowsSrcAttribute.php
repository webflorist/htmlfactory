<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsSrcAttribute
{

    /**
     * Set value of HTML-attribute 'src'.
     *
     * @param string $source
     * @return $this
     */
    public function src(string $source)
    {
        $this->attributes->establish('src')->setValue($source);
        return $this;
    }

}