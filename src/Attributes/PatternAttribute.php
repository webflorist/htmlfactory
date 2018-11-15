<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'pattern'
 *
 * Class PatternAttribute
 * @package Webflorist\HtmlFactory
 */
class PatternAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'pattern';
    }
}