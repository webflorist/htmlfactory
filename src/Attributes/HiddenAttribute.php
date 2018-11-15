<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'hidden'
 *
 * Class HiddenAttribute
 * @package Webflorist\HtmlFactory
 */
class HiddenAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'hidden';
    }
}