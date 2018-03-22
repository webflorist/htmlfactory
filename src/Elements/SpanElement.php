<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<span></span>'
 *
 * Class SpanElement
 * @package Nicat\HtmlFactory
 */
class SpanElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'span';
    }
}