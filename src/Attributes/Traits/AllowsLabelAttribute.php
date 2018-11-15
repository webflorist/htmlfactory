<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\LabelAttribute;

trait AllowsLabelAttribute
{

    /**
     * Set value of HTML-attribute 'label'.
     *
     * @param string|\Closure $label
     * @return $this
     */
    public function label($label)
    {
        $this->attributes->establish(LabelAttribute::class)->setValue($label);
        return $this;
    }

}