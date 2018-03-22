<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('action')->setValue($action);
        return $this;
    }

}