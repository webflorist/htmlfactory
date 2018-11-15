<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<span></span>'
 *
 * Class SpanElement
 * @package Webflorist\HtmlFactory
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