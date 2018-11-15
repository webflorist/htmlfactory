<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'required'
 *
 * Class RequiredAttribute
 * @package Webflorist\HtmlFactory
 */
class RequiredAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'required';
    }
}