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
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'p';
}