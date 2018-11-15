<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<p></p>'
 *
 * Class PElement
 * @package Webflorist\HtmlFactory
 */
class PElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'p';
    }
}