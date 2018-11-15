<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsSelectedAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing the HTML-element '<option></option>'.
 *
 * Class OptionElement
 * @package Nicat\HtmlFactory
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