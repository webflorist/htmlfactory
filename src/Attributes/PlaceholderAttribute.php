<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'placeholder'
 *
 * Class PlaceholderAttribute
 * @package Nicat\HtmlFactory
 */
class PlaceholderAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'placeholder';
    }
}