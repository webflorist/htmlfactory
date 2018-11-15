<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsPatternAttribute
{

    /**
     * Set value of HTML-attribute 'pattern'.
     *
     * @param string $pattern
     * @return $this
     */
    public function pattern(string $pattern)
    {
        $this->attributes->establish('pattern')->setValue($pattern);
        return $this;
    }

}