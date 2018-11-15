<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAcceptCharsetAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsActionAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsEnctypeAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMethodAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNovalidateAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTargetAttribute;

/**
 * Class representing the HTML-element '<form></form>'
 *
 * Class FormElement
 * @package Webflorist\HtmlFactory
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
    protected function getName(): string
    {
        return 'form';
    }
}