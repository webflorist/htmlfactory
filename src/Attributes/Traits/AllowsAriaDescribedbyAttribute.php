<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\AriaDescribedbyAttribute;

trait AllowsAriaDescribedbyAttribute
{

    /**
     * Add an id to the list of the HTML-attribute 'aria-describedby'
     *
     * @param string $id
     * @return $this
     */
    public function addAriaDescribedby(string $id)
    {
        $this->attributes->establish(AriaDescribedbyAttribute::class)->addValue($id);
        return $this;
    }

}