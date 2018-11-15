<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsTypeAttribute
{

    /**
     * Set value of HTML-attribute 'type'.
     *
     * @param string $type
     * @return $this
     */
    public function type(string $type)
    {
        $this->attributes->establish('type')->setValue($type);
        return $this;
    }

}