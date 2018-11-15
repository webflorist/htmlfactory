<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'id'
 *
 * Class IdAttribute
 * @package Webflorist\HtmlFactory
 */
class IdAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'id';
    }
}