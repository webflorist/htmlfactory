<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'accept'
 *
 * Class AcceptAttribute
 * @package Nicat\HtmlFactory
 */
class AcceptAttribute extends ListAttribute
{

    protected $divider = '|';

    public function getName(): string
    {
        return 'accept';
    }
}