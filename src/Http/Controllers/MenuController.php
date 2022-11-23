<?php

namespace ParthShukla\Rbac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ParthShukla\Rbac\Http\Requests\MenuPostRequest;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
// end of class MenuController
// end of file MenuController.php
