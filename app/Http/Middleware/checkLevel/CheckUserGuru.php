<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if user level is admin
        if (Auth::user() && Auth::user()->level == 1) {
            return $next($request);
        } 

        // if user level is guru
        else if (Auth::user() && Auth::user()->level == 2) {
            return $next($request);
        }

        return redirect('normal.home');
    }
}
