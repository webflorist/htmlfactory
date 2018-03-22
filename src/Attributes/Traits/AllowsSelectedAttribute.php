<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

trait AllowsSelectedAttribute
{

    /**
     * Set value of HTML-attribute 'selected'.
     *
     * @param bool $selected
     * @return $this
     */
    public function selected(bool $selected = true)
    {
        $this->attributes->establish('selected')->setValue($selected);
        return $this;
    }

}