<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$roles)
    {
        if (!Auth::check()){ // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('login');
        }
        $user = Auth::user();
        $user=Auth::user();
            if($user && $user->roles !=$roles){
                return App::abort(Auth::check()?403:401,
                Auth::check()?'Access Denied ':'Unauthorized');
            }
        return $next($request);
    }
}
