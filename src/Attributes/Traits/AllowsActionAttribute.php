<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ActionAttribute;

trait AllowsActionAttribute
{

    /**
     * Set value of HTML-attribute 'action'.
     *
     * @param string|\Closure $action
     * @return $this
     */
    public function action($action)
    {
        $this->attributes->establish(ActionAttribute::class)->setValue($action);
        return $this;
    }

}