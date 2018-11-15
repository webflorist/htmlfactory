<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'novalidate'
 *
 * Class NovalidateAttribute
 * @package Webflorist\HtmlFactory
 */
class NovalidateAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'novalidate';
    }
}