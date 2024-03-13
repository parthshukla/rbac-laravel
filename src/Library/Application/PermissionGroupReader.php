<?php

namespace ParthShukla\Rbac\Library\Application;

use Illuminate\Support\Facades\Log;
use ParthShukla\Rbac\Http\Resources\PermissionGroupCollection;
use ParthShukla\Rbac\Http\Resources\PermissionGroupResource;
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

        $query = $this->permissionGroups->select('id', 'name', 'description', 'is_active');

        if (request()->has('name')) {
            $query->where('name', 'like', '%'.request('name').'%');
        }

        if (request()->has('status')) {
            $status = request('status') == 'active' ? 1 : 0;
            $query->where('is_active', $status);
        }

        return new PermissionGroupCollection($query->paginate($limit));
    }

    //--------------------------------------------------------------------------------------

    /**
     * Returns details of a permission group
     *
     * @param $id
     * @return mixed
     */
    public function getPermissionGroupDetails($id)
    {
        try {
            $permission = $this->permissionGroups->findOrFail($id);
            return new PermissionGroupResource($permission);
        } catch (\Exception $e) {
            Log::error('Invalid permission id passed: '.$e->getMessage());
            return false;
        }
    }

}
//end of class PermissionGroupReader
//end of file PermissionGroupReader.php
