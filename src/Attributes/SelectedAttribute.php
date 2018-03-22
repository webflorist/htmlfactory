<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'selected'
 *
 * Class SelectedAttribute
 * @package Nicat\HtmlFactory
 */
class SelectedAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'selected';
    }
}