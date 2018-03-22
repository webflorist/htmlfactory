<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'readonly'
 *
 * Class ReadonlyAttribute
 * @package Nicat\HtmlFactory
 */
class ReadonlyAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'readonly';
    }
}