<?php

namespace Nicat\HtmlFactory\Components\Traits;

trait CanBeInline
{

    /**
     * Should this element be inline?
     *
     * @var bool
     */
    protected $inline = false;

    /**
     * Make this component inline.
     *
     * @param bool $inline
     * @return $this
     */
    public function inline(bool $inline=true)
    {
        $this->inline = $inline;
        return $this;
    }

    /**
     * Is this element inline?
     *
     * @return $this
     */
    public function isInline() : string
    {
        return $this->inline;
    }

}