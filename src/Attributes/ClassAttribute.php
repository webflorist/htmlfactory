<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'class'
 *
 * Class ClassAttribute
 * @package Nicat\HtmlFactory
 */
class ClassAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'class';
    }
}