<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'rel'
 *
 * Class RelAttribute
 * @package Webflorist\HtmlFactory
 */
class RelAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'rel';
    }
}
