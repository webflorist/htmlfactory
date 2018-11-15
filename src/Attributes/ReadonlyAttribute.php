<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'readonly'
 *
 * Class ReadonlyAttribute
 * @package Webflorist\HtmlFactory
 */
class ReadonlyAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'readonly';
    }
}