<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Auth::guard($guard)->user());
        if (Auth::guard($guard)->check()) {
           $path = $this->returnRoleDependentControllerPath(strtolower(Auth::guard($guard)->user()->getRole()));
            return redirect($path);
        }

        return $next($request);
    }

     /**
     * Return Controller Depending upon Role
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function returnRoleDependentControllerPath($role)
    {
        switch($role){
            case "admin":
                return "/admin/home";
            case "curator":
                return "/curator/home";
            case "editor":
                return "/editor/home";
            default:
                 return "/";       

        }
    }
}
