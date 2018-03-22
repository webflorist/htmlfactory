<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'required'
 *
 * Class RequiredAttribute
 * @package Nicat\HtmlFactory
 */
class RequiredAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'required';
    }
}