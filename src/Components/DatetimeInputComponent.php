<?php

namespace Nicat\HtmlFactory\Components;

use Nicat\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Nicat\HtmlFactory\Elements\InputElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMaxAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMinAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsStepAttribute;

/**
 * Class representing the HTML-component '<input type="datetime" />'
 *
 * Class DatetimeInputComponent
 * @package Nicat\HtmlFactory
 */
class DatetimeInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsAutocompleteAttribute,
        AllowsMaxAttribute,
        AllowsMinAttribute,
        AllowsStepAttribute;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('datetime');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'datetimeInput';
    }
}