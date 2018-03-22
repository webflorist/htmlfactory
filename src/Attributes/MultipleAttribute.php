<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'multiple'
 *
 * Class MultipleAttribute
 * @package Nicat\HtmlFactory
 */
class MultipleAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'multiple';
    }
}