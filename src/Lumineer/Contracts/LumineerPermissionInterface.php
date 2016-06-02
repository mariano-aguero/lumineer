<?php

namespace Peaches\Lumineer\Contracts;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

interface LumineerPermissionInterface
{
    
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
}
