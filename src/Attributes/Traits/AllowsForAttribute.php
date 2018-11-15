<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsForAttribute
{

    /**
     * Set value of HTML-attribute 'for'.
     *
     * @param string $id
     * @return $this
     */
    public function for(string $id)
    {
        $this->attributes->establish('for')->setValue($id);
        return $this;
    }

}