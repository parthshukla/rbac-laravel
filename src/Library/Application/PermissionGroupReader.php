<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Http\Resources\PermissionGroupCollection;
use ParthShukla\Rbac\Models\PermissionGroups;

/**
 * Class PermissionGroupReader
 *
 * @package ParthShukla\Rbac\Library\Application
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionGroupReader
{

    /**
     * PermissionGroups
     *
     * @var PermissionGroups
     */
    protected $permissionGroups;

    //--------------------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param PermissionGroups $permissionGroups
     */
    public function __construct(PermissionGroups $permissionGroups)
    {
        $this->permissionGroups = $permissionGroups;
    }

    //--------------------------------------------------------------------------------------

    /**
     * Returns list of all the permission groups
     *
     * @return PermissionGroupCollection
     */
    public function getAllPermissionGroups()
    {
        $limit = request('limit') > 0 ?
                    request('limit') : config('ps-rbac.perPageResultLimit');
        return new PermissionGroupCollection($this->permissionGroups->paginate($limit));
    }

}
//end of class PermissionGroupReader
//end of file PermissionGroupReader.php
