<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ReadonlyAttribute;

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
        $this->attributes->establish(ReadonlyAttribute::class)->setValue($readonly);
        return $this;
    }

}