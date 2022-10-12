<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Role;

/**
 * RoleReader
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RoleReader
{

    /**
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
     * Returns a paginated list of the roles.
     *
     * @return mixed
     */
    public function roleList()
    {
        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
                            request('limit'): config('ps-rbac.perPageResultLimit');
        return $this->role->paginate($pageLimit);
    }

}
// end of class RoleReader
// end of file RoleReader.php
