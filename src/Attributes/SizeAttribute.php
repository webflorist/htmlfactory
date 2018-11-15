<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'size'
 *
 * Class SizeAttribute
 * @package Webflorist\HtmlFactory
 */
class SizeAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'size';
    }
}