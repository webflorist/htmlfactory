<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'disabled'
 *
 * Class DisabledAttribute
 * @package Nicat\HtmlFactory
 */
class DisabledAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'disabled';
    }
}