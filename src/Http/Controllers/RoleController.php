<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\RolePostRequest;
use ParthShukla\Rbac\Library\Application\RoleReader;
use ParthShukla\Rbac\Library\Application\RoleWriter;

/**
 * RoleController class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RoleController extends Controller
{

    /**
     * Instance of RoleWriter
     *
     * @var RoleWriter
     */
    protected $roleWriter;

    /**
     * Instance of RoleReader
     *
     * @var RoleReader
     */
    protected $roleReader;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param RoleWriter $roleWriter
     * @param RoleReader $
     */
    public function __construct(RoleWriter $roleWriter, RoleReader $roleReader)
    {
        $this->roleWriter = $roleWriter;
        $this->roleReader = $roleReader;
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for listing all the roles.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response($this->roleReader->roleList());
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for adding new role in the application.
     *
     * @param RolePostRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(RolePostRequest $request)
    {
        if($this->roleWriter->add($request->all()))
        {
            return response(["message" => __('ps-rbac::general.add_role_success')]);
        }

        return response(["message" => __('ps-rbac::general.server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
// end of class RoleController
// end of file RoleController.php
