<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\EmptyElement;

/**
 * Class representing the HTML-element '<br />'
 *
 * Class BrElement
 * @package Webflorist\HtmlFactory
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