<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $permission
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if a permission is required for the route, and
        // if so, ensure that the user has that permission.
        $userPermissions = session()->get('userPermissions');
        if (in_array($request->route()->getName(), $userPermissions)) {
            return $next($request);
        }
        abort(403, 'This action is unauthorized.');
    }
}
