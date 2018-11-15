<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutocompleteAttribute;

/**
 * Class representing the HTML-component '<input type="color" />'
 *
 * Class ColorInputComponent
 * @package Webflorist\HtmlFactory
 */
class ColorInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsAutocompleteAttribute;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('color');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'colorInput';
    }
}