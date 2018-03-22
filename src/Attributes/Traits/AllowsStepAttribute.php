<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('step')->setValue($step);
        return $this;
    }

}