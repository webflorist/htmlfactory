<?php

namespace Webflorist\HtmlFactory\Components\Traits;

trait HasContext
{

    /**
     * A context to be used by components and decorators.
     *
     * @var string
     */
    protected $context;

    /**
     * Set a context to be used by components and decorators.
     *
     * @param string $context
     * @return $this
     */
    public function context(string $context) : self
    {
        $this->context = $context;
        return $this;
    }

    /**
     * Get the context.
     *
     * @return $this
     */
    public function getContext() : string
    {
        return $this->context;
    }

    /**
     * Is a context set?
     *
     * @return bool
     */
    public function hasContext() : bool
    {
        return strlen($this->context)>0;
    }

}