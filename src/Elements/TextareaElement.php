<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMaxlengthAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsPlaceholderAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsReadonlyAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsRowsAttribute;

/**
 * Class representing the HTML-element '<textarea></textarea>'
 *
 * Class TextareaElement
 * @package Nicat\HtmlFactory
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
    public function getName(): string
    {
        return 'textarea';
    }
}