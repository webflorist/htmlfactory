<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\SrcAttribute;

trait AllowsSrcAttribute
{

    /**
     * Set value of HTML-attribute 'src'.
     *
     * @param string|\Closure $source
     * @return $this
     */
    public function src($source)
    {
        $this->attributes->establish(SrcAttribute::class)->setValue($source);
        return $this;
    }

}