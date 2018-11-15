<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'autofocus'
 *
 * Class AutofocusAttribute
 * @package Webflorist\HtmlFactory
 */
class AutofocusAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'autofocus';
    }
}