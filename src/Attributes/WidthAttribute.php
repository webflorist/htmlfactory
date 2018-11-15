<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'width'
 *
 * Class WidthAttribute
 * @package Webflorist\HtmlFactory
 */
class WidthAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'width';
    }
}