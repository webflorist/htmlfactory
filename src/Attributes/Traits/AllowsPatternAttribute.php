<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\PatternAttribute;

trait AllowsPatternAttribute
{

    /**
     * Set value of HTML-attribute 'pattern'.
     *
     * @param string $pattern
     * @return $this
     */
    public function pattern(string $pattern)
    {
        $this->attributes->establish(PatternAttribute::class)->setValue($pattern);
        return $this;
    }

}