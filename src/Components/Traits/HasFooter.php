<?php

namespace Webflorist\HtmlFactory\Components\Traits;

use Webflorist\HtmlFactory\Elements\Abstracts\Element;

trait HasFooter
{

    /**
     * A footer to be used by components and decorators.
     *
     * @var string
     */
    protected $footer;

    /**
     * Sets the content of a footer.
     * $footer either be another 'Element' object or a string.
     *
     * @param Element|string $footer
     * @return $this
     */
    public function footer($footer) : self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * Get the footer.
     *
     * @return $this
     */
    public function getFooter() : string
    {
        return $this->footer;
    }

    /**
     * Is a footer set?
     *
     * @return bool
     */
    public function hasFooter() : bool
    {
        return strlen($this->footer)>0;
    }

}