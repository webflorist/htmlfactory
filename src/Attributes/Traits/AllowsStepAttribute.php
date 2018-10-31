<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\StepAttribute;

trait AllowsStepAttribute
{

    /**
     * Set value of HTML-attribute 'step'.
     *
     * @param int $step
     * @return $this
     */
    public function step(int $step)
    {
        $this->attributes->establish(StepAttribute::class)->setValue($step);
        return $this;
    }

}