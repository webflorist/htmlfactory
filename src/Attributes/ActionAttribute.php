<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'action'
 *
 * Class ActionAttribute
 * @package Nicat\HtmlFactory
 */
class ActionAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'action';
    }
}