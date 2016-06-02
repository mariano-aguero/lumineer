<?php

namespace Peaches\Lumineer\Traits;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

use Illuminate\Support\Facades\Config;

trait LumineerPermissionTrait
{
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(
            Config::get('lumineer.role'),
            Config::get('lumineer.permission_role_table')
        );
    }

    /**
     * Boot the permission model
     * Attach event listener to remove the many-to-many records when trying to delete
     * Will NOT delete any records if the permission model uses soft deletes.
     *
     * @return void|bool
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($permission) {
            if (!method_exists(Config::get('lumineer.permission'), 'bootSoftDeletes')) {
                $permission->roles()->sync([]);
            }

            return true;
        });
    }
}
