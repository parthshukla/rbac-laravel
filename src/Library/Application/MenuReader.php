<?php

namespace ParthShukla\Rbac\Library\Application;

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
}
// end of class MenuReader
// end of file MenuReader.php
