<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'multiple'
 *
 * Class MultipleAttribute
 * @package Webflorist\HtmlFactory
 */
class MultipleAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'multiple';
    }
}