<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'for'
 *
 * Class ForAttribute
 * @package Webflorist\HtmlFactory
 */
class ForAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'for';
    }
}