<?php

namespace Webflorist\HtmlFactory\Components\Traits;

use Webflorist\HtmlFactory\Elements\Abstracts\Element;

trait HasHeader
{

    /**
     * A header to be used by components and decorators.
     *
     * @var string
     */
    protected $header;

    /**
     * Sets the content of a header.
     * $header either be another 'Element' object or a string.
     *
     * @param Element|string $header
     * @return $this
     */
    public function header($header) : self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Get the header.
     *
     * @return $this
     */
    public function getHeader() : string
    {
        return $this->header;
    }

    /**
     * Is a header set?
     *
     * @return bool
     */
    public function hasHeader() : bool
    {
        return strlen($this->header)>0;
    }

}