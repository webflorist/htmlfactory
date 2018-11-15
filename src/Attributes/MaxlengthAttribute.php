<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'maxlength'
 *
 * Class MaxlengthAttribute
 * @package Webflorist\HtmlFactory
 */
class MaxlengthAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'maxlength';
    }
}