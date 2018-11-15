<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'accept'
 *
 * Class AcceptAttribute
 * @package Webflorist\HtmlFactory
 */
class AcceptAttribute extends ListAttribute
{

    protected $divider = '|';

    public function getName(): string
    {
        return 'accept';
    }
}