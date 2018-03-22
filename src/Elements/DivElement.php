<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<div></div>'
 *
 * Class DivElement
 * @package Nicat\HtmlFactory
 */
class DivElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'div';
    }
}