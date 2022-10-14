<?php

namespace ParthShukla\Rbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model class Permission
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class Permission extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * Table associated with the model class
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Columns that cannot be mass assigned
     *
     * @var string[]
     */
    protected $guarded = ['id'];
}
// end of class Permission
// end of file Permission.php
