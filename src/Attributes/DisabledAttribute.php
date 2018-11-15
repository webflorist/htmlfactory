<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'disabled'
 *
 * Class DisabledAttribute
 * @package Webflorist\HtmlFactory
 */
class DisabledAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'disabled';
    }
}