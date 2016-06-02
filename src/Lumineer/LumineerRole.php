<?php

namespace Peaches\Lumineer;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

use Peaches\Lumineer\Contracts\LumineerRoleInterface;
use Peaches\Lumineer\Traits\LumineerRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class LumineerRole extends Model implements LumineerRoleInterface
{
    use LumineerRoleTrait;

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
        $this->table = Config::get('Lumineer.roles_table');
    }
}
