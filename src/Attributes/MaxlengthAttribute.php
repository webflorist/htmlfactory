<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'maxlength'
 *
 * Class MaxlengthAttribute
 * @package Nicat\HtmlFactory
 */
class MaxlengthAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'maxlength';
    }
}