<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'id'
 *
 * Class IdAttribute
 * @package Nicat\HtmlFactory
 */
class IdAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'id';
    }
}