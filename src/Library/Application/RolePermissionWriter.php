<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Role;

/**
 * RolePermissionWriter
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePermissionWriter
{

    /**
     * Instance of Role
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
     * Assigns the permissions to a role
     *
     * @param array $data
     * @return mixed
     */
    public function assignPermissionToRole(array $data)
    {
        $role = $this->role->find($data['role']);
        if($role)
        {
            return $role->permissions()->sync($data['permissions']);
        }
        return false;
    }

}
// end of class RolePermissionWriter
// end of file RolePermissionWriter.php
