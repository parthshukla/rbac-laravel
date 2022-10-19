<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Http\Resources\PermissionResource;
use ParthShukla\Rbac\Models\Permission;

/**
 * PermissionReader
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionReader
{

    /**
     * Instance of Permission class
     *
     * @var Permission
     */
    protected $permission;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    //-------------------------------------------------------------------------

    /**
     * Reads details of the permisison matching the passed id
     *
     * @param $permisisonId
     * @return PermissionResource
     */
    public function getPermissionDetails($permisisonId)
    {
        return new PermissionResource($this->permission->find($permisisonId));
    }

}
// end of class PermissionReader
// end of file PermissionReader.php
