<?php

namespace ParthShukla\Rbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model class Menu
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class Menu extends Model
{
    use HasFactory;

    /**
     * Table associated with the Model class
     *
     * @var string
     */
    protected $table = 'menu';

    /**
     * Attributes that cannot be mass assigned
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    //-------------------------------------------------------------------------

    /**
     * Returns the menu items in paginated format
     *
     * @param int $pageLimit
     * @return mixed
     */
    public function getMenuItems(int $pageLimit)
    {
        return $this->leftJoin('menu as pMenu', 'menu.parent_id', '=', 'pMenu.id')
                    ->select(['menu.id', 'menu.name', 'menu.display_name', 'menu.parent_id', 'pMenu.name as parent_name',
                           'menu.display_order', 'menu.status'])
                    ->paginate($pageLimit);
    }
}
// end of class Menu
// end of file Menu.php
