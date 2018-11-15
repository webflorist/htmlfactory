<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsTargetAttribute
{

    /**
     * Set value of HTML-attribute 'target'.
     *
     * @param string $target
     * @return $this
     */
    public function target(string $target)
    {
        $this->attributes->establish('target')->setValue($target);
        return $this;
    }

}