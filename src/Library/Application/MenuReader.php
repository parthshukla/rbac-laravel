<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Http\Resources\MenuCollection;
use ParthShukla\Rbac\Http\Resources\MenuResource;
use ParthShukla\Rbac\Models\Menu;

/**
 * MenuReader class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuReader
{

    /**
     * Instance of Menu
     *
     * @var Menu
     */
    protected $menu;

    //-------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    //-------------------------------------------------------------------------

    /**
     * Returns the details of menu matching the passed id
     *
     * @param int $menuId
     * @return MenuResource
     */
    public function getMenuDetails(int $menuId)
    {
        return new MenuResource($this->menu->find($menuId));
    }

    //-------------------------------------------------------------------------

    /**
     * Returns the list of all the menu items
     *
     * @return MenuCollection
     */
    public function getMenuList()
    {
        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
            request('limit'): config('ps-rbac.perPageResultLimit');

        return new MenuCollection($this->menu->getMenuItems($pageLimit));
    }
}
// end of class MenuReader
// end of file MenuReader.php
