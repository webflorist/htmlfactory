<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing a 'data-*' HTML-attribute
 *
 * Class DataAttribute
 * @package Nicat\HtmlFactory
 */
class DataAttribute extends StringAttribute
{

    /**
     * The suffix of the data-attribute.
     *
     * @var string
     */
    private $suffix;

    /**
     * DataAttribute constructor.
     *
     * @param string $suffix
     */
    public function __construct(string $suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * Returns the name of the attribute.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'data-'.$this->suffix;
    }
}