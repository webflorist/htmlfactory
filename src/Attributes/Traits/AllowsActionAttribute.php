<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\ActionAttribute;

trait AllowsActionAttribute
{

    /**
     * Set value of HTML-attribute 'action'.
     *
     * @param string $action
     * @return $this
     */
    public function action(string $action)
    {
        $this->attributes->establish(ActionAttribute::class)->setValue($action);
        return $this;
    }

}