<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsPlaceholderAttribute
{

    /**
     * Set value of HTML-attribute 'placeholder'.
     *
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder)
    {
        $this->attributes->establish('placeholder')->setValue($placeholder);
        return $this;
    }

}