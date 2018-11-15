<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'alt'
 *
 * Class AltAttribute
 * @package Webflorist\HtmlFactory
 */
class AltAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'alt';
    }
}