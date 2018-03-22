<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\BooleanAttribute;

/**
 * Class representing the HTML-attribute 'autofocus'
 *
 * Class AutofocusAttribute
 * @package Nicat\HtmlFactory
 */
class AutofocusAttribute extends BooleanAttribute
{

    public function getName(): string
    {
        return 'autofocus';
    }
}