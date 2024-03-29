<?php

namespace ParthShukla\Rbac\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AddNewPermissionGroupRequest;
use ParthShukla\Rbac\Http\Requests\UpdatePermissionGroupRequest;
use ParthShukla\Rbac\Library\Application\PermissionGroupReader;
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

    /**
     * PermissionGroupReader
     *
     * @var PermissionGroupReader
     */
    protected $permissionGroupReader;

    //--------------------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param PermissionGroupWriter $permissionGroupWriter
     * @param PermissionGroupReader $permissionGroupReader
     */
    public function __construct(PermissionGroupWriter $permissionGroupWriter,
                                PermissionGroupReader $permissionGroupReader)
    {
        $this->permissionGroupWriter = $permissionGroupWriter;
        $this->permissionGroupReader = $permissionGroupReader;
    }

    //--------------------------------------------------------------------------------------

    /**
     * Returns list of all the permission groups
     *
     * @return Application|ResponseFactory|Response
     */
    public function index()
    {
        return response($this->permissionGroupReader->getAllPermissionGroups(),
            Response::HTTP_OK) ;
    }

    //--------------------------------------------------------------------------------------


    /**
     * Returns details of a permission group
     *
     * @param $id
     * @return Application|ResponseFactory|Response
     */
    public function show($id)
    {
        $response = $this->permissionGroupReader->getPermissionGroupDetails($id);

        if($response)
        {
            return response($response, Response::HTTP_OK);
        }
        else
        {
            return response(['message' => __('ps-rbac::general.server_error')],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //--------------------------------------------------------------------------------------

    /**
     * Add new permission group
     *
     * @param AddNewPermissionGroupRequest $request
     * @return Application|ResponseFactory|Response
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

    //--------------------------------------------------------------------------------------

    /**
     * Update permission group
     *
     * @param UpdatePermissionGroupRequest $request
     * @param $id
     * @return Application|ResponseFactory|Response
     */
    public function update(UpdatePermissionGroupRequest $request, $id)
    {
        if($this->permissionGroupWriter->update($request->validated(), $id))
        {
            return response(['message' => __('ps-rbac::general.update_permission_group_success')],
                Response::HTTP_OK);
        }
        return response(['message' => __('ps-rbac::general.server_error')],
                Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
//end of class PermissionGroupController
//end of file PermissionGroupController.php
