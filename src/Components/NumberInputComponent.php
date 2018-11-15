<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMaxAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMaxlengthAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsMinAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsStepAttribute;

/**
 * Class representing the HTML-component '<input type="number" />'
 *
 * Class NumberInputComponent
 * @package Webflorist\HtmlFactory
 */
class NumberInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsMaxlengthAttribute,
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
        $this->type('number');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'numberInput';
    }
}