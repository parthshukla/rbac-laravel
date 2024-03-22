<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AssignPermissionRoleRequest;
use ParthShukla\Rbac\Library\Application\PermissionGroupReader;
use ParthShukla\Rbac\Library\Application\RolePermissionReader;
use ParthShukla\Rbac\Library\Application\RolePermissionWriter;

/**
 * RolePermissionController
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePermissionController extends Controller
{

    /**
     * Instance of RolePermissionWriter
     *
     * @var RolePermissionWriter
     */
    protected $rolePermissionWriter;

    /**
     * Instance of RolePermissionReader
     *
     * @var RolePermissionReader
     */
    protected $rolePermissionReader;

    /**
     * Instance of PermissionGroupReader
     *
     * @var PermissionGroupReader
     */
    protected $permissionGroupReader;

    //-------------------------------------------------------------------------

    /**
     * Construct
     *
     * @param RolePermissionWriter $rolePermissionWriter
     * @param RolePermissionReader $rolePermissionReader
     * @param PermissionGroupReader $permissionGroupReader
     */
    public function __construct(RolePermissionWriter $rolePermissionWriter,
                        RolePermissionReader $rolePermissionReader, PermissionGroupReader $permissionGroupReader)
    {
        $this->rolePermissionWriter = $rolePermissionWriter;
        $this->rolePermissionReader = $rolePermissionReader;
        $this->permissionGroupReader = $permissionGroupReader;
    }

    //-------------------------------------------------------------------------


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @since 1.2.1
     */
    public function index()
    {
        $data['data'] = $this->permissionGroupReader->getPermissionsByGroup();
        return response($data, Response::HTTP_OK);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles requests for assigning permissions to role
     *
     * @param AssignPermissionRoleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(AssignPermissionRoleRequest $request)
    {
        if($this->rolePermissionWriter->assignPermissionToRole($request->validated()))
        {
            return response(["message" => __('ps-rbac::general.assign_permission_to_role_success')], Response::HTTP_CREATED);
        }

        return response(["message" => __('ps-rbac::general.server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for listing all the permissions assigned to a role.
     *
     * @param int $roleId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function show(int $roleId)
    {
        return response($this->rolePermissionReader->getPermissionsAssignedToRole($roleId), Response::HTTP_OK);
    }

}
// end of class RolePermissionController
// end of file RolePermissionController.php
