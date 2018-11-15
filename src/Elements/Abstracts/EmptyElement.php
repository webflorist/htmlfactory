<?php

namespace Webflorist\HtmlFactory\Elements\Abstracts;

/**
 * A HTML-element, that cannot contain other elements.
 * They are closed in the start tag (e.g. '<br />').
 *
 * Class EmptyElement
 * @package Webflorist\HtmlFactory
 */
abstract class EmptyElement extends Element
{
    /**
     * Render the element to an HTML-string.
     *
     * @return string
     */
    public function renderHtml(): string
    {
        return '<' . $this->getName() . $this->attributes->render(true) . ' />';

    }
}