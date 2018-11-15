<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Attributes\Traits\AllowsVueModelDirective;
use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMultipleAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;

/**
 * Class representing the HTML-element '<select></select>'
 *
 * Class SelectElement
 * @package Webflorist\HtmlFactory
 */
class SelectElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsAriaInvalidAttribute,
        AllowsAutofocusAttribute,
        AllowsDisabledAttribute,
        AllowsMultipleAttribute,
        AllowsNameAttribute,
        AllowsRequiredAttribute,
        AllowsVueModelDirective;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'select';
    }
}