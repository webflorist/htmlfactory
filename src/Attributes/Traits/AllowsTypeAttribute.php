<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\TypeAttribute;

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
        $this->attributes->establish(TypeAttribute::class)->setValue($type);
        return $this;
    }

}