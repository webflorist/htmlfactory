<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'checked'
 *
 * Class CheckedAttribute
 * @package Webflorist\HtmlFactory
 */
class CheckedAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'checked';
    }
}