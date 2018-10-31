<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\SrcAttribute;

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
        $this->attributes->establish(SrcAttribute::class)->setValue($source);
        return $this;
    }

}