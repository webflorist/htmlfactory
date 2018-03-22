<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsNameAttribute
{

    /**
     * Set value of HTML-attribute 'name'.
     *
     * @param string $name
     * @return $this
     */
    public function name(string $name)
    {
        $this->attributes->establish('name')->setValue($name);
        return $this;
    }

}