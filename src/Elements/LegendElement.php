<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<legend></legend>'
 *
 * Class LegendElement
 * @package Webflorist\HtmlFactory
 */
class LegendElement extends ContainerElement
{
    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'legend';
}