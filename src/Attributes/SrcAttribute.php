<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'src'
 *
 * Class SrcAttribute
 * @package Webflorist\HtmlFactory
 */
class SrcAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'src';
    }
}