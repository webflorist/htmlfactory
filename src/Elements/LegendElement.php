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
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'legend';
    }
}