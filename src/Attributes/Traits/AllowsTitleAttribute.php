<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\TitleAttribute;

trait AllowsTitleAttribute
{

    /**
     * Set value of HTML-attribute 'title'.
     *
     * @param string|\Closure $title
     * @return $this
     */
    public function title($title)
    {
        $this->attributes->establish(TitleAttribute::class)->setValue($title);
        return $this;
    }

}