<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'height'
 *
 * Class HeightAttribute
 * @package Webflorist\HtmlFactory
 */
class HeightAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'height';
    }
}