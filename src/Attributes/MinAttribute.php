<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'min'
 *
 * Class MinAttribute
 * @package Webflorist\HtmlFactory
 */
class MinAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'min';
    }
}