<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'hreflang'
 *
 * Class HreflangAttribute
 * @package Webflorist\HtmlFactory
 */
class HreflangAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'hreflang';
    }
}
