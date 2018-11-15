<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'width'
 *
 * Class WidthAttribute
 * @package Nicat\HtmlFactory
 */
class WidthAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'width';
    }
}