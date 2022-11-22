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
    public function add(array $data) :bool
    {
        // setting up the information to be saved
        $this->menu->name = $data['name'];
        $this->menu->display_name = $data['displayName'];
        $this->menu->parent_id = empty($data['parentId']) ? null : $data['parentId'];
        $this->menu->display_order = empty($data['displayOrder']) ? 0 : $data['displayOrder'];
        $this->menu->status = empty($data['status']) ? 'disabled' : $data['status'];

        // saving the menu
        return $this->menu->save();
    }
}
// end of class MenuWriter
// end of file MenuWriter.php
