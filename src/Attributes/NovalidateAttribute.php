<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'novalidate'
 *
 * Class NovalidateAttribute
 * @package Nicat\HtmlFactory
 */
class NovalidateAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'novalidate';
    }
}