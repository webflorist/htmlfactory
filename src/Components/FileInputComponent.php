<?php

namespace Nicat\HtmlFactory\Components;

use Nicat\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Nicat\HtmlFactory\Elements\InputElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAcceptAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsMultipleAttribute;

/**
 * Class representing the HTML-component '<input type="file" />'
 *
 * Class FileInputComponent
 * @package Nicat\HtmlFactory
 */
class FileInputComponent extends InputElement implements RegisteredComponentInterface
{
    /**
     * Use corresponding traits for all type-specific HTML-attributes.
     */
    use AllowsAcceptAttribute,
        AllowsMultipleAttribute;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('file');
    }

    /**
     * Returns the method-name, under which this component will be accessible with the 'Html'-facade.
     *
     * @return string
     */
    static function getAccessor(): string
    {
        return 'fileInput';
    }
}