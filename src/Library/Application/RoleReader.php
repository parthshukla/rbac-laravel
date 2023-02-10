<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Http\Resources\RoleCollection;
use ParthShukla\Rbac\Http\Resources\RoleResource;
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
        // setting the page limit
        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
                            request('limit'): config('ps-rbac.perPageResultLimit');

        $query = $this->role->select(['id','name','description', 'status']);

        // filter by name
        if(request()->has('name'))
        {
            $query->where('name', 'like', '%'.request('name').'%');
        }

        //filter by status
        if(request()->has('status'))
        {
            $query->where('status', request('status'));
        }
        return new RoleCollection($query->paginate($pageLimit));
    }

    //-------------------------------------------------------------------------

    /**
     * Returns the details of the role matching the passed id.
     *
     * @param $roleId
     * @return mixed
     */
    public function getRoleDetails($roleId)
    {
        return new RoleResource($this->role->find($roleId));
    }

}
// end of class RoleReader
// end of file RoleReader.php
