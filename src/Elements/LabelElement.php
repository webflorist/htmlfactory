<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsForAttribute;

/**
 * Class representing the HTML-element '<label></label>'
 *
 * Class LabelElement
 * @package Nicat\HtmlFactory
 */
class LabelElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsForAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'label';
    }
}