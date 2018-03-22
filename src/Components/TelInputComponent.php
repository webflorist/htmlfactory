<?php

namespace Nicat\HtmlFactory\Components;

use Nicat\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Nicat\HtmlFactory\Elements\InputElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMaxlengthAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsPatternAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsPlaceholderAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsSizeAttribute;

/**
 * Class representing the HTML-component '<input type="tel" />'
 *
 * Class TelInputComponent
 * @package Nicat\HtmlFactory
 */
class TelInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsAutocompleteAttribute,
        AllowsMaxlengthAttribute,
        AllowsPatternAttribute,
        AllowsPlaceholderAttribute,
        AllowsSizeAttribute;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('tel');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'telInput';
    }
}