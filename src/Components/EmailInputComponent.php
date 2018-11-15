<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMaxlengthAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMultipleAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsPatternAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsPlaceholderAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsSizeAttribute;

/**
 * Class representing the HTML-component '<input type="email" />'
 *
 * Class EmailInputComponent
 * @package Webflorist\HtmlFactory
 */
class EmailInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsAutocompleteAttribute,
        AllowsMaxlengthAttribute,
        AllowsMultipleAttribute,
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
        $this->type('email');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'emailInput';
    }
}