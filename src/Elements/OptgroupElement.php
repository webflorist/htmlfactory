<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsLabelAttribute;

/**
 * Class representing the HTML-element '<optgroup></optgroup>'.
 *
 * Class OptgroupElement
 * @package Webflorist\HtmlFactory
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
    protected function getName(): string
    {
        return 'optgroup';
    }
}