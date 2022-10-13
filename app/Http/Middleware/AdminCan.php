<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Classes\Helper;

class AdminCan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role_permission)
    {
        if(! Helper::admin_user()->can($role_permission))
            abort(403, 'This action is unauthorized.');
        return $next($request);
    }
}
