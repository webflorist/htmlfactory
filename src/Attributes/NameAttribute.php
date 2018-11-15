<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'name'
 *
 * Class NameAttribute
 * @package Webflorist\HtmlFactory
 */
class NameAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'name';
    }
}