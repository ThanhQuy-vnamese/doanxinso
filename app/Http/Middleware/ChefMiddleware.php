<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ChefMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->chucvu=='chef')
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('loginchef');
            }
        }
        else
        {
            return redirect()->route('loginchef');
        }
    }
}
