<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'max'
 *
 * Class MaxAttribute
 * @package Nicat\HtmlFactory
 */
class MaxAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'max';
    }
}