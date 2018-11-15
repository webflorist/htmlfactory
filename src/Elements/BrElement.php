<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\EmptyElement;

/**
 * Class representing the HTML-element '<br />'
 *
 * Class BrElement
 * @package Nicat\HtmlFactory
 */
class BrElement extends EmptyElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'br';
    }
}