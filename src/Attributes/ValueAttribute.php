<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'value'
 *
 * Class ValueAttribute
 * @package Webflorist\HtmlFactory
 */
class ValueAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'value';
    }
}