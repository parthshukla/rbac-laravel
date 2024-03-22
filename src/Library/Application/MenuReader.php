<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Http\Resources\MenuCollection;
use ParthShukla\Rbac\Http\Resources\MenuResource;
use ParthShukla\Rbac\Http\Resources\ParentMenuCollection;
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
        // setting the value of limit
        $pageLimit = (request()->has('limit') && request('limit') > 0) ?
            request('limit'): config('ps-rbac.perPageResultLimit');

        $query = $this->menu->leftJoin('menu as pMenu', 'menu.parent_id', '=', 'pMenu.id')
                    ->select(['menu.id', 'menu.name', 'menu.display_name', 'menu.parent_id',
                        'pMenu.name as parent_name','menu.display_order', 'menu.status',
                        'menu.icon', 'menu.route']);

        if(request()->has('name'))
        {
            $query->where('menu.name','like','%'.request()->input('name').'%');
        }

        if(request()->has('status'))
        {
            $query->where('menu.status', request()->input('status'));
        }



        return new MenuCollection($query->paginate($pageLimit));
    }

    //-------------------------------------------------------------------------

    /**
     * Returns the menu items whose parent id is null
     *
     * @return ParentMenuCollection
     */
    public function getParentMenuList()
    {
        return new ParentMenuCollection($this->menu->parent()->select('id', 'name', 'display_name', 'icon', 'route')->get());
    }
}
// end of class MenuReader
// end of file MenuReader.php
