<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\MenuPostRequest;
use ParthShukla\Rbac\Http\Requests\MenuPutRequest;
use ParthShukla\Rbac\Http\Requests\MenuStatusChagneRequest;
use ParthShukla\Rbac\Library\Application\MenuReader;
use ParthShukla\Rbac\Library\Application\MenuWriter;

/**
 * MenuController class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuController extends Controller
{

    /**
     * Instance of MenuWriter
     *
     * @var MenuWriter
     */
    protected $menuWriter;

    /**
     * Instance of MenuReader
     *
     * @var MenuReader
     */
    protected $menuReader;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param MenuWriter $menuWriter
     * @param MenuReader $menuReader
     */
    public function __construct(MenuWriter $menuWriter, MenuReader $menuReader)
    {
        $this->menuWriter = $menuWriter;
        $this->menuReader = $menuReader;
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for showing list of menu items
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response($this->menuReader->getMenuList(), Response::HTTP_OK);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for adding a new menu item
     *
     * @param MenuPostRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(MenuPostRequest $request)
    {
        if($this->menuWriter->add($request->validated()))
        {
            return response(['message' => __('ps-rbac::general.add_new_menu_success')],
                Response::HTTP_CREATED);
        }
        return response(["message" => __('ps-rbac::general.server_error')],
                Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for showing the details of a menu
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function show($id)
    {
        return response($this->menuReader->getMenuDetails($id), Response::HTTP_OK);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for updating a menu item
     *
     * @param MenuPutRequest $request
     * @param int $id
     * @return void
     */
    public function update(MenuPutRequest $request, int $id)
    {
        if($this->menuWriter->update($request->validated(), $id))
        {
            return response(['message' => __('ps-rbac::general.update_menu_success')],
                    Response::HTTP_OK);
        }

        return response(["message" => __('ps-rbac::general.server_error')],
                    Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    //-------------------------------------------------------------------------

    /**
     * Handles request for updating the status of a menu item
     *
     * @param MenuStatusChagneRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function changeStatus(MenuStatusChagneRequest $request)
    {
        if($this->menuWriter->updateStatus($request->validated()))
        {
            return response(['message' => __('ps-rbac::general.menu_status_change_success')],
                Response::HTTP_OK);
        }

        return response(['message' => __('ps-rbac::general.server_error')], Response::HTTP_OK);
    }
}
// end of class MenuController
// end of file MenuController.php
