<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'href'
 *
 * Class HrefAttribute
 * @package Webflorist\HtmlFactory
 */
class HrefAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'href';
    }
}
