<?php

namespace ParthShukla\Rbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionGroups
 *
 * @package ParthShukla\Rbac\Models
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionGroups extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission_groups';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = ['id'];
}
//end of class PermissionGroups
//end of file PermissionGroups.php