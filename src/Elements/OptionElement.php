<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsSelectedAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing the HTML-element '<option></option>'.
 *
 * Class OptionElement
 * @package Webflorist\HtmlFactory
 */
class OptionElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsDisabledAttribute,
        AllowsSelectedAttribute,
        AllowsValueAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'option';
    }
}