<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsIdAttribute
{

    /**
     * Set value of HTML-attribute 'id'.
     *
     * @param string $id
     * @return $this
     */
    public function id(string $id)
    {
        $this->attributes->establish('id')->setValue($id);
        return $this;
    }

}