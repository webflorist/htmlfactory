<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\TypeAttribute;

trait AllowsTypeAttribute
{

    /**
     * Set value of HTML-attribute 'type'.
     *
     * @param string|\Closure $type
     * @return $this
     */
    public function type($type)
    {
        $this->attributes->establish(TypeAttribute::class)->setValue($type);
        return $this;
    }

}