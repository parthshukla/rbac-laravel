<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Permission;

/**
 * PermissionWriter class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionWriter
{

    /**
     * Instance of Permission
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
     * Adds the permission information
     *
     * @param array $data
     * @return void
     */
    public function add(array $data)
    {
        // initializing the data to be saved
        $this->permission->name = $data['name'];
        $this->permission->description = $data['description'];

        // saving the permission details
        return $this->permission->save();
    }
}
// end of class PermissionWriter
// end of file PermissionWriter.php
