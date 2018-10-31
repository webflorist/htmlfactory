<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\LabelAttribute;

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
        $this->attributes->establish(LabelAttribute::class)->setValue($label);
        return $this;
    }

}