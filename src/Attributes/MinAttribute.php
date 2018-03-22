<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'min'
 *
 * Class MinAttribute
 * @package Nicat\HtmlFactory
 */
class MinAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'min';
    }
}