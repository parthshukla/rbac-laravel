<?php

namespace ParthShukla\Rbac\Models;

use Illuminate\Database\Eloquent\Builder;
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

    //--------------------------------------------------------------------------------------

    /**
     * Get the permissions that belongs to the group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class,'permission_group_id');
    }

    //--------------------------------------------------------------------------------------

    /**
     * Scope a query to only include active permission groups.
     *
     * @param Builder $query
     * @since 1.2.1
     * @return void
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', 1);
    }
}
//end of class PermissionGroups
//end of file PermissionGroups.php
