<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\TargetAttribute;

trait AllowsTargetAttribute
{

    /**
     * Set value of HTML-attribute 'target'.
     *
     * @param string|\Closure $target
     * @return $this
     */
    public function target($target)
    {
        $this->attributes->establish(TargetAttribute::class)->setValue($target);
        return $this;
    }

}