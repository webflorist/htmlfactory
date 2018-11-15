<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\ActionAttribute;

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