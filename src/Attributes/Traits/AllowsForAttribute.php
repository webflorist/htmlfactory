<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ForAttribute;

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
        $this->attributes->establish(ForAttribute::class)->setValue($id);
        return $this;
    }

}