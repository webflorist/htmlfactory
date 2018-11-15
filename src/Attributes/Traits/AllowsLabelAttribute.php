<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsLabelAttribute
{

    /**
     * Set value of HTML-attribute 'label'.
     *
     * @param string $label
     * @return $this
     */
    public function label(string $label)
    {
        $this->attributes->establish('label')->setValue($label);
        return $this;
    }

}