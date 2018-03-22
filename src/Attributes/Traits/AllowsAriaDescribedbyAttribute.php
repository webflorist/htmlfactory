<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('aria-describedby')->addValue($id);
        return $this;
    }

}