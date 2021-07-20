<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
            if($user->chucvu=='staff')
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('loginstaff');
            }
        }
        else
        {
            return redirect()->route('loginstaff');
        }
    }
}
