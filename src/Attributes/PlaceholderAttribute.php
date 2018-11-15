<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'placeholder'
 *
 * Class PlaceholderAttribute
 * @package Webflorist\HtmlFactory
 */
class PlaceholderAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'placeholder';
    }
}