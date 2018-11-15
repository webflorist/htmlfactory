<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'selected'
 *
 * Class SelectedAttribute
 * @package Webflorist\HtmlFactory
 */
class SelectedAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'selected';
    }
}