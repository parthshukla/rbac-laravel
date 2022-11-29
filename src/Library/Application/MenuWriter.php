<?php

namespace ParthShukla\Rbac\Library\Application;

use ParthShukla\Rbac\Models\Menu;

/**
 * MenuWriter
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuWriter
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
     * Saves the menu information
     *
     * @param array $data
     * @return bool
     */
    public function add(array $data): bool
    {
        // setting up the information to be saved
        $this->menu->name = $data['name'];
        $this->menu->display_name = $data['displayName'];
        $this->menu->parent_id = empty($data['parentId']) ? null : $data['parentId'];
        $this->menu->display_order = empty($data['displayOrder']) ? 0 : $data['displayOrder'];
        $this->menu->status = empty($data['status']) ? 'disabled' : $data['status'];

        // saving the menu
        $this->menu->save();

        if(!empty($data['permissionId']))
        {
            $this->menu->permissions()->attach($data['permissionId']);
        }
        return true;
    }

    //-------------------------------------------------------------------------

    /**
     * Updates the information of the menu matching the passed id
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $menu = $this->menu->findOrFail($id);

        //updating the information
        $menu->name = $data['name'];
        $menu->display_name = $data['displayName'];
        $menu->parent_id = empty($data['parentId']) ? null : $data['parentId'];
        $menu->display_order = empty($data['displayOrder']) ? 0 : $data['displayOrder'];
        $menu->status = empty($data['status']) ? 'disabled' : $data['status'];

        //removing the previous permission
        $menu->permissions()->detach();

        if(!empty($data['permissionId']))
        {
            $menu->permissions()->attach($data['permissionId']);
        }

        // saving the updated information
        return $menu->save();
    }

    //-------------------------------------------------------------------------

    /**
     * Updates the status of a menu item
     *
     * @param $data
     * @return mixed
     */
    public function updateStatus($data)
    {
        $menu = $this->menu->findOrFail($data['menuId']);

        // updating the status
        $menu->status = $data['status'];

        // saving the updated status
        return $menu->save();
    }
}
// end of class MenuWriter
// end of file MenuWriter.php
