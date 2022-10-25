<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AssignPermissionRoleRequest;
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

    //-------------------------------------------------------------------------


    /**
     * Constructor
     *
     * @param RolePermissionWriter $rolePermissionWriter
     */
    public function __construct(RolePermissionWriter $rolePermissionWriter)
    {
        $this->rolePermissionWriter = $rolePermissionWriter;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
