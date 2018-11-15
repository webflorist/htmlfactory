<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'class'
 *
 * Class ClassAttribute
 * @package Webflorist\HtmlFactory
 */
class ClassAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'class';
    }
}