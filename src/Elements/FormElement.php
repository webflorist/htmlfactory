<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAcceptCharsetAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsActionAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsEnctypeAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMethodAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNovalidateAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsTargetAttribute;

/**
 * Class representing the HTML-element '<form></form>'
 *
 * Class FormElement
 * @package Nicat\HtmlFactory
 */
class FormElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsAcceptCharsetAttribute,
        AllowsActionAttribute,
        AllowsAutocompleteAttribute,
        AllowsEnctypeAttribute,
        AllowsMethodAttribute,
        AllowsNameAttribute,
        AllowsNovalidateAttribute,
        AllowsTargetAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'form';
    }
}