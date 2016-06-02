<?php

namespace Peaches\Lumineer;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

use Peaches\Lumineer\Contracts\LumineerPermissionInterface;
use Peaches\Lumineer\Traits\LumineerPermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class LumineerPermission extends Model implements LumineerPermissionInterface
{
    use LumineerPermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('Lumineer.permissions_table');
    }
}
