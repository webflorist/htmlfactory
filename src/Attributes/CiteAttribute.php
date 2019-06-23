<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'cite'
 *
 * Class CiteAttribute
 * @package Webflorist\HtmlFactory
 */
class CiteAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'cite';
    }
}