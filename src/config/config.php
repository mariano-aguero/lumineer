<?php

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Lumineer Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Lumineer to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'App\Role',

    /*
    |--------------------------------------------------------------------------
    | Lumineer Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Lumineer to save roles to the database.
    |
    */
    'roles_table' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Lumineer Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Lumineer to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'App\Permission',

    /*
    |--------------------------------------------------------------------------
    | Lumineer Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Lumineer to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'permissions',

    /*
    |--------------------------------------------------------------------------
    | Lumineer permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Lumineer to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'permission_role',

    /*
    |--------------------------------------------------------------------------
    | Lumineer role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Lumineer to save assigned roles to the
    | database.
    |
    */
    'role_user_table' => 'role_user',

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Lumineer's role_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'user_foreign_key' => 'user_id',

    /*
    |--------------------------------------------------------------------------
    | Role Foreign key on Lumineer's role_user and permission_role Tables (Pivot)
    |--------------------------------------------------------------------------
    */
    'role_foreign_key' => 'role_id',

    /*
    |--------------------------------------------------------------------------
    | Permission Foreign key on Lumineer's permission_role Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'permission_foreign_key' => 'permission_id',
];
