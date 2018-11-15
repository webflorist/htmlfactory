<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\ButtonElement;

/**
 * Class representing the HTML-component '<button type="reset"></button>'
 *
 * Class ButtonElement
 * @package Webflorist\HtmlFactory
 */
class ResetButtonComponent extends ButtonElement implements RegisteredComponentInterface
{

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('reset');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'resetButton';
    }

}