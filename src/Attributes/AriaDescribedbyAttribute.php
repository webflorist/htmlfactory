<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'aria-describedby'
 *
 * Class AriaDescribedbyAttribute
 * @package Nicat\HtmlFactory
 */
class AriaDescribedbyAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'aria-describedby';
    }
}