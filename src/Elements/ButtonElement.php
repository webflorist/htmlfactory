<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAutofocusAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDisabledAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsNameAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTypeAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsValueAttribute;

/**
 * Class representing the HTML-element '<button></button>'
 *
 * Class ButtonElement
 * @package Webflorist\HtmlFactory
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