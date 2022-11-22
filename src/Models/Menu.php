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
}
// end of class Menu
// end of file Menu.php
