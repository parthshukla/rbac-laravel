<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Role;

/**
 * Rbac class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class Rbac
{

    /**
     * Instance of role class
     *
     * @var Role
     */
    protected $role;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    //-------------------------------------------------------------------------

    /**
     * Checks if a role has access to a permission
     *
     * @param $roleId
     * @param $permission
     * @return mixed
     */
    public function checkAccess($roleId, $permission)
    {
        $role = $this->role->find($roleId);
        return $role->permissions()->where('permissions.name', $permission)->exists();
    }

}
// end of class Rbac
// end of file Rbac.php
