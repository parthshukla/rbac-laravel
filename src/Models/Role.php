<?php

namespace ParthShukla\Rbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * RoleWriter
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class Role extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * Name of the table this model class refers to
     *
     * @var string
     * @protected
     */
    protected $table = 'roles';

    /**
     * Columns that cannot be mass assigned.
     *
     * @protected
     * @var string[]
     */
    protected $guarded = ['id'];

    //-------------------------------------------------------------------------

    /**
     * Get all the permissions assigned to this role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
// end of class Role
// end of file Role.php
