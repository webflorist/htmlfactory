<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'hidden'
 *
 * Class HiddenAttribute
 * @package Nicat\HtmlFactory
 */
class HiddenAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'hidden';
    }
}