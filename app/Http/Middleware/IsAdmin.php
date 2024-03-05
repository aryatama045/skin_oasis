<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
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
        if (Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff' || Auth::user()->user_type == 'dokter' || Auth::user()->user_type == 'klinik' || Auth::user()->user_type == 'mitra')) {
            return $next($request);
        }
        else{
            abort(403);
        }
    }
}
