<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'accept-charset'
 *
 * Class AcceptCharsetAttribute
 * @package Webflorist\HtmlFactory
 */
class AcceptCharsetAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'accept-charset';
    }
}