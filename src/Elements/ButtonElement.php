<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsTypeAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing the HTML-element '<button></button>'
 *
 * Class ButtonElement
 * @package Nicat\HtmlFactory
 */
class ButtonElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsAutofocusAttribute,
        AllowsDisabledAttribute,
        AllowsNameAttribute,
        AllowsTypeAttribute,
        AllowsValueAttribute;

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->type('button');
    }

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'button';
    }
}