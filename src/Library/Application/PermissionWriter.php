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

    //-------------------------------------------------------------------------

    /**
     * Updates the permission information
     *
     * @param array $data
     * @param $id
     * @return bool
     */
    public function update(array $data, $id)
    {
        $permission = $this->permission->findOrFail($id);

        // updating the information
        $permission->name = $data['name'];
        $permission->description = $data['description'];
        $permission->status = $data['status'];

        // saving the updated information
        return $permission->save();
    }

    //-------------------------------------------------------------------------

    /**
     * Updates the status of a permission.
     *
     * @param $data
     * @return mixed
     */
    public function updateStatus($data)
    {
        $permission = $this->permission->findOrFail($data['id']);

        // updating the status
        $permission->status = $data['status'];

        // saving the updated information
        return $permission->save();
    }
}
// end of class PermissionWriter
// end of file PermissionWriter.php
