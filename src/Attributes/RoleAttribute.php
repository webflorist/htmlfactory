<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'role'
 *
 * Class RoleAttribute
 * @package Nicat\HtmlFactory
 */
class RoleAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'role';
    }
}