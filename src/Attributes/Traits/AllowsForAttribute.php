<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\ForAttribute;

trait AllowsForAttribute
{

    /**
     * Set value of HTML-attribute 'for'.
     *
     * @param string|\Closure $id
     * @return $this
     */
    public function for($id)
    {
        $this->attributes->establish(ForAttribute::class)->setValue($id);
        return $this;
    }

}