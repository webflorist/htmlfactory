<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsLabelAttribute;

/**
 * Class representing the HTML-element '<optgroup></optgroup>'.
 *
 * Class OptgroupElement
 * @package Nicat\HtmlFactory
 */
class OptgroupElement extends ContainerElement
{

    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsLabelAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'optgroup';
    }
}