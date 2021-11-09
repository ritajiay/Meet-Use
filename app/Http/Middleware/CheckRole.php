<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckRole
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
public function handle($request, Closure $next, ...$roles)
{
    $roleIds = ['user' => 1, 'manager' => 2, 'admin' => 3];
        $allowedRoleIds = [];
    foreach ($roles as $role)
    {
        if(isset($roleIds[$role]))
        {
            $allowedRoleIds[] = $roleIds[$role];
        }
    }
    $allowedRoleIds = array_unique($allowedRoleIds); 

    if(Auth::check()) {
        if(in_array(Auth::user()->role, $allowedRoleIds)) {
        return $next($request);
        }
    }

    return redirect('/homepage');
}
}
