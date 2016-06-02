<?php

namespace Peaches\Lumineer\Middleware;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

use Closure;
use Illuminate\Contracts\Auth\Guard;

class LumineerRole
{
    const DELIMITER = '|';

    protected $auth;

    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @param  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (!is_array($roles)) {
            $roles = explode(self::DELIMITER, $roles);
        }
  
        if ($this->auth->guest() || !$request->user()->hasRole($roles)) {
            abort(403);
        }

        return $next($request);
    }
}
