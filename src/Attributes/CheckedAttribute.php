<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'checked'
 *
 * Class CheckedAttribute
 * @package Nicat\HtmlFactory
 */
class CheckedAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'checked';
    }
}