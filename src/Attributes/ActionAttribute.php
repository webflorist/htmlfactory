<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'action'
 *
 * Class ActionAttribute
 * @package Webflorist\HtmlFactory
 */
class ActionAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'action';
    }
}