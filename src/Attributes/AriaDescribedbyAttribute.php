<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'aria-describedby'
 *
 * Class AriaDescribedbyAttribute
 * @package Webflorist\HtmlFactory
 */
class AriaDescribedbyAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'aria-describedby';
    }
}