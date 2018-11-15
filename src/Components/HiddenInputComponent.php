<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\InputElement;

/**
 * Class representing the HTML-component '<input type="hidden" />'
 *
 * Class HiddenInputComponent
 * @package Webflorist\HtmlFactory
 */
class HiddenInputComponent extends InputElement implements RegisteredComponentInterface
{

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('hidden');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'hiddenInput';
    }
}