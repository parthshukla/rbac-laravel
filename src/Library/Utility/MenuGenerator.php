<?php

namespace ParthShukla\Rbac\Library\Utility;

use ParthShukla\Rbac\Models\Menu;

/**
 * MenuGenerator class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuGenerator
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
     * Returns the menu for a particular role.
     *
     * @param int $roleId
     * @return array
     */
    public function getRoleMenu(int $roleId)
    {
        $menu = [];

        $menuResult =  $this->menu->getMenuForRole($roleId);

        foreach($menuResult as $menuItem)
        {
            $arrMenuItem = [
                'name' => $menuItem->menu_name,
                'displayName' => empty($menuItem->menu_display_name)  ? "" : $menuItem->menu_display_name,
                'parentName' => empty($menuItem->parent_menu_name) ? "" : $menuItem->parent_menu_name,
                'displayOrder' => $menuItem->display_order,
                'subMenu' => [],
            ];

            if(is_null($menuItem->parent_menu_id))
            {
                // menu without any sub-menu
                $menu[$menuItem->menu_name] = $arrMenuItem;
            }
            else if(!array_key_exists($menuItem->parent_menu_name, $menu))
            {
                $menu[$menuItem->parent_menu_name] = [
                    'name' => $menuItem->parent_menu_name,
                    'displayName' => empty($menuItem->parent_menu_display_name)  ? "" : $menuItem->parent_menu_display_name,
                    'parentName' => empty($menuItem->parent_menu_name) ? "" : $menuItem->parent_menu_name,
                    'displayOrder' => $menuItem->parent_menu_display_order,
                    'subMenu' => [],
                ];
                array_push($menu[$menuItem->parent_menu_name]['subMenu'], $arrMenuItem);
            }
            else {
                array_push($menu[$menuItem->parent_menu_name]['subMenu'], $arrMenuItem);
            }
        }
        return $menu;
    }
}
// end of class MenuGenerator
// end of file MenuGenerator.php
