<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AssignPermissionRoleRequest;
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

    //-------------------------------------------------------------------------

    /**
     * Construct
     *
     * @param RolePermissionWriter $rolePermissionWriter
     * @param RolePermissionReader $rolePermissionReader
     */
    public function __construct(RolePermissionWriter $rolePermissionWriter,
                        RolePermissionReader $rolePermissionReader)
    {
        $this->rolePermissionWriter = $rolePermissionWriter;
        $this->rolePermissionReader = $rolePermissionReader;
    }

    //-------------------------------------------------------------------------


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    //-------------------------------------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
// end of class RolePermissionController
// end of file RolePermissionController.php
