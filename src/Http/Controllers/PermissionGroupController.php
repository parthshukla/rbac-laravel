<?php

namespace ParthShukla\Rbac\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AddNewPermissionGroupRequest;
use ParthShukla\Rbac\Library\Application\PermissionGroupWriter;

/**
 * Class PermissionGroupController
 *
 * @package ParthShukla\Rbac\Http\Controllers
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionGroupController extends Controller
{
    /**
     * PermissionGroupWriter
     *
     * @var PermissionGroupWriter
     */
    protected $permissionGroupWriter;

    //--------------------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param PermissionGroupWriter $permissionGroupWriter
     */
    public function __construct(PermissionGroupWriter $permissionGroupWriter)
    {
        $this->permissionGroupWriter = $permissionGroupWriter;
    }

    //--------------------------------------------------------------------------------------

    /**
     * Add new permission group
     *
     * @param AddNewPermissionGroupRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(AddNewPermissionGroupRequest $request)
    {
        if($this->permissionGroupWriter->add($request->validated()))
        {
            return response(['message' => __('ps-rbac::general.add_new_permission_group_success')],
                Response::HTTP_CREATED);
        }
        return response(['message' => __('ps-rbac::general.server_error')],
                Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
//end of class PermissionGroupController
//end of file PermissionGroupController.php
