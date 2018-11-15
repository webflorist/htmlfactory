<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'max'
 *
 * Class MaxAttribute
 * @package Webflorist\HtmlFactory
 */
class MaxAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'max';
    }
}