<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'accept-charset'
 *
 * Class AcceptCharsetAttribute
 * @package Nicat\HtmlFactory
 */
class AcceptCharsetAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'accept-charset';
    }
}