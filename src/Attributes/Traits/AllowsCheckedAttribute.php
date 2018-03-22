<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsCheckedAttribute
{

    /**
     * Set value of HTML-attribute 'checked'.
     *
     * @param bool $checked
     * @return $this
     */
    public function checked(bool $checked = true)
    {
        $this->attributes->establish('checked')->setValue($checked);
        return $this;
    }

}