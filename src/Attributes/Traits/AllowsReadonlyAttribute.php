<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsReadonlyAttribute
{

    /**
     * Set value of HTML-attribute 'readonly'.
     *
     * @param bool $readonly
     * @return $this
     */
    public function readonly(bool $readonly = true)
    {
        $this->attributes->establish('readonly')->setValue($readonly);
        return $this;
    }

}