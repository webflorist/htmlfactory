<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\IdAttribute;

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