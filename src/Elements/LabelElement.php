<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsForAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMultipleAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsRequiredAttribute;

/**
 * Class representing the HTML-element '<label></label>'
 *
 * Class LabelElement
 * @package Nicat\HtmlFactory
 */
class LabelElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsForAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    protected function getName(): string
    {
        return 'label';
    }
}