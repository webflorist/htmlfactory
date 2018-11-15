<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\RowsAttribute;

trait AllowsRowsAttribute
{

    /**
     * Set value of HTML-attribute 'rows'.
     *
     * @param int|\Closure $rows
     * @return $this
     */
    public function rows($rows)
    {
        $this->attributes->establish(RowsAttribute::class)->setValue($rows);
        return $this;
    }

}