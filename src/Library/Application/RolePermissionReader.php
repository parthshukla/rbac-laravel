<?php

namespace ParthShukla\Rbac\Library\Application;

use Illuminate\Support\Facades\Log;
use ParthShukla\Rbac\Http\Resources\RolePermissionResource;
use ParthShukla\Rbac\Models\Role;

/**
 * RolePermissionReader
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePermissionReader
{

    /**
     * Instance of Role
     *
     * @var Role
     */
    protected $role;

    //-------------------------------------------------------------------------

    /**
     * Construct
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    //-------------------------------------------------------------------------

    /**
     * Returns all the permission assigned to a role
     *
     * @param int $roleId
     * @return array|RolePermissionResource
     */
    public function getPermissionsAssignedToRole(int $roleId)
    {
        try {
            $role = $this->role->findOrFail($roleId);
        } catch (\Exception $e)
        {
            Log::alert('Error occurred while listing the permission assigned to a role: ' . $e->getMessage());
            return [];
        }

        return new RolePermissionResource($role);
    }

}
// end of class RolePermissionReader
// end of file RolePermissionReader.php
