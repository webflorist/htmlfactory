<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'role'
 *
 * Class RoleAttribute
 * @package Webflorist\HtmlFactory
 */
class RoleAttribute extends ListAttribute
{

    public function getName(): string
    {
        return 'role';
    }
}