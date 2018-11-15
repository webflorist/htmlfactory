<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'title'
 *
 * Class TitleAttribute
 * @package Webflorist\HtmlFactory
 */
class TitleAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'title';
    }
}