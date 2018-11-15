<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Attributes\Traits\AllowsVueModelDirective;
use Nicat\HtmlFactory\Elements\Abstracts\EmptyElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsReadonlyAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsTypeAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing a HTML-element '<input />'
 * There are also type-specific component-classes for each input-type (e.g. 'TextInputComponent')
 *
 * Class InputElement
 * @package Nicat\HtmlFactory
 */
class InputElement extends EmptyElement
{

    // Use corresponding traits for all HTML-attributes allowed for all input-types.
    use AllowsAriaInvalidAttribute,
        AllowsAutofocusAttribute,
        AllowsDisabledAttribute,
        AllowsNameAttribute,
        AllowsReadonlyAttribute,
        AllowsRequiredAttribute,
        AllowsTypeAttribute,
        AllowsValueAttribute,
        AllowsVueModelDirective;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'input';
    }
}