<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\AddNewPermission;
use ParthShukla\Rbac\Http\Requests\UpdatePermissionRequest;
use ParthShukla\Rbac\Library\Application\PermissionWriter;

/**
 * PermissionController
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionController extends Controller
{

    /**
     * Instance of the PermissionWriter
     *
     * @var PermissionWriter
     */
    protected $permissionWriter;

    //-------------------------------------------------------------------------

    /**
     * Construct
     *
     * @param PermissionWriter $permissionWriter
     */
    public function __construct(PermissionWriter $permissionWriter)
    {
        $this->permissionWriter = $permissionWriter;
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
     * Handles request for adding new permission
     *
     * @param AddNewPermission $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(AddNewPermission $request)
    {
        if($this->permissionWriter->add($request->validated()))
        {
            return response(['message' => __('ps-rbac::general.add_new_permission_success')], Response::HTTP_CREATED);
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

    //-------------------------------------------------------------------------


    /**
     * Handles request for updating permission information
     *
     * @param UpdatePermissionRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        if($this->permissionWriter->update($request->validated(), $id))
        {
            return response(['message' => __('ps-rbac::general.update_permission_success')], Response::HTTP_OK);
        }

        return response(["message" => __('ps-rbac::general.server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    //-------------------------------------------------------------------------

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
// end of class PermissionController
// end of file PermissionController.php
