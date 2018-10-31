<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\RoleAttribute;

trait AllowsRoleAttribute
{

    /**
     * Add a HTML-role to element.
     *
     * @param string $role
     * @return $this
     */
    public function addRole(string $role)
    {
        $this->attributes->establish(RoleAttribute::class)->addValue($role);
        return $this;
    }

}