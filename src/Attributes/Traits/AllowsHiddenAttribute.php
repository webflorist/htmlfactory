<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsHiddenAttribute
{

    /**
     * Set value of HTML-attribute 'hidden'.
     *
     * @param bool $hidden
     * @return $this
     */
    public function hidden(bool $hidden = true)
    {
        $this->attributes->establish('hidden')->setValue($hidden);
        return $this;
    }

}