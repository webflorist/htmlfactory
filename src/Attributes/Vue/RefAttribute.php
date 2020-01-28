<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'ref'
 * used by Vue to register a reference
 * to an element or a child component.
 *
 * Class RefAttribute
 * @package Webflorist\HtmlFactory
 */
class RefAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'ref';
    }
}
