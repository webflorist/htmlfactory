<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'size'
 *
 * Class SizeAttribute
 * @package Nicat\HtmlFactory
 */
class SizeAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'size';
    }
}