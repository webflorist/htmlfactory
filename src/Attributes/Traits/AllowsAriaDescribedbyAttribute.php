<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\AriaDescribedbyAttribute;

trait AllowsAriaDescribedbyAttribute
{

    /**
     * Add an id to the list of the HTML-attribute 'aria-describedby'
     *
     * @param string|\Closure $id
     * @return $this
     */
    public function addAriaDescribedby($id)
    {
        $this->attributes->establish(AriaDescribedbyAttribute::class)->addValue($id);
        return $this;
    }

}