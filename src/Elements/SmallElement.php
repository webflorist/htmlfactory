<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<small></small>'
 *
 * Class SmallElement
 * @package Webflorist\HtmlFactory
 */
class SmallElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'small';
    }
}