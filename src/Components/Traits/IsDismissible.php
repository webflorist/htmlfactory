<?php

namespace Webflorist\HtmlFactory\Components\Traits;

trait IsDismissible
{

    /**
     * Should this element be dismissible?
     *
     * @var bool
     */
    protected $dismissible = false;

    /**
     * Make this component dismissible.
     *
     * @param bool $dismissible
     * @return $this
     */
    public function dismissible(bool $dismissible=true)
    {
        $this->dismissible = $dismissible;
        return $this;
    }

    /**
     * Is this element dismissible?
     *
     * @return $this
     */
    public function isDismissible() : string
    {
        return $this->dismissible;
    }

}