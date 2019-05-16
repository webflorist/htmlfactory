<?php

namespace Webflorist\HtmlFactory\Components\Traits;

trait HasLayout
{

    /**
     * A layout to be used by components and decorators.
     *
     * @var string
     */
    protected $layout;

    /**
     * Set a layout to be used by components and decorators.
     *
     * @param string $layout
     * @return $this
     */
    public function layout(string $layout) : self
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Get the layout.
     *
     * @return $this
     */
    public function getLayout() : string
    {
        return $this->layout;
    }

    /**
     * Is a layout set?
     *
     * @return bool
     */
    public function hasLayout() : bool
    {
        return strlen($this->layout)>0;
    }

}