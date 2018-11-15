<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

trait AllowsTitleAttribute
{

    /**
     * Set value of HTML-attribute 'title'.
     *
     * @param string $title
     * @return $this
     */
    public function title(string $title)
    {
        $this->attributes->establish('title')->setValue($title);
        return $this;
    }

}