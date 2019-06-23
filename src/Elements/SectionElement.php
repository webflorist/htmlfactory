<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<section></section>'
 *
 * Class SectionElement
 * @package Webflorist\HtmlFactory
 */
class SectionElement extends ContainerElement
{
    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'section';
}