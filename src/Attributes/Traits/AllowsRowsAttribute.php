<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsRowsAttribute
{

    /**
     * Set value of HTML-attribute 'rows'.
     *
     * @param int $rows
     * @return $this
     */
    public function rows(int $rows)
    {
        $this->attributes->establish('rows')->setValue($rows);
        return $this;
    }

}