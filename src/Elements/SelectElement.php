<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Attributes\Traits\AllowsVueModelDirective;
use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMultipleAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;

/**
 * Class representing the HTML-element '<select></select>'
 *
 * Class SelectElement
 * @package Nicat\HtmlFactory
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