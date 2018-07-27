<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<legend></legend>'
 *
 * Class LegendElement
 * @package Nicat\HtmlFactory
 */
class LegendElement extends ContainerElement
{
    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'legend';
    }
}