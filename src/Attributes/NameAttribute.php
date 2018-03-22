<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'name'
 *
 * Class NameAttribute
 * @package Nicat\HtmlFactory
 */
class NameAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'name';
    }
}