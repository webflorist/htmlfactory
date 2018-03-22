<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<small></small>'
 *
 * Class SmallElement
 * @package Nicat\HtmlFactory
 */
class SmallElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'small';
    }
}