<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'value'
 *
 * Class ValueAttribute
 * @package Nicat\HtmlFactory
 */
class ValueAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'value';
    }
}