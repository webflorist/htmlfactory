<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMaxlengthAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsPlaceholderAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsReadonlyAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRowsAttribute;

/**
 * Class representing the HTML-element '<textarea></textarea>'
 *
 * Class TextareaElement
 * @package Webflorist\HtmlFactory
 */
class TextareaElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsAutofocusAttribute,
        AllowsDisabledAttribute,
        AllowsMaxlengthAttribute,
        AllowsNameAttribute,
        AllowsPlaceholderAttribute,
        AllowsReadonlyAttribute,
        AllowsRequiredAttribute,
        AllowsAriaInvalidAttribute,
        AllowsRowsAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'textarea';
    }
}