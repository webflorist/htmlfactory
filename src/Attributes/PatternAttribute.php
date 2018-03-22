<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'pattern'
 *
 * Class PatternAttribute
 * @package Nicat\HtmlFactory
 */
class PatternAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'pattern';
    }
}