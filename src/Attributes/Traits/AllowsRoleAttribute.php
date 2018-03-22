<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

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
        $this->attributes->establish('role')->addValue($role);
        return $this;
    }

}