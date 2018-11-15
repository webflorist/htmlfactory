<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\IdAttribute;

trait AllowsIdAttribute
{

    /**
     * Set value of HTML-attribute 'id'.
     *
     * @param string|\Closure $id
     * @return $this
     */
    public function id($id)
    {
        $this->attributes->establish(IdAttribute::class)->setValue($id);
        return $this;
    }

}