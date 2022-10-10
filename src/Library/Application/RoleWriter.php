<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Role;

/**
 * RoleWriter class
 *
 * @version 1.0.0
 * @since 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RoleWriter
{
    /**
     * Instance of model RoleWriter
     *
     * @var Role
     * @since 1.0.0
     */
    protected $role;

    //-------------------------------------------------------------------------

    /**
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    //-------------------------------------------------------------------------

    /**
     * Adds the new role
     *
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // initializing the values to be saved
        $this->role->name = $data['name'];
        $this->role->description = $data['description'];

        // saving new role in the db
        return $this->role->save();
    }
}
// end of class RoleWriter
// end of file RoleWriter.php
