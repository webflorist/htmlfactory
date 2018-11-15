<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Attributes\Traits\AllowsVueModelDirective;
use Webflorist\HtmlFactory\Elements\Abstracts\EmptyElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAriaInvalidAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsReadonlyAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTypeAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing a HTML-element '<input />'
 * There are also type-specific component-classes for each input-type (e.g. 'TextInputComponent')
 *
 * Class InputElement
 * @package Webflorist\HtmlFactory
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