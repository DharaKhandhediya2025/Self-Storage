<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next,$role) {

        if($role == 'admin') {

            if (auth()->guard('admin')->user() == '') {
                return redirect('/admin/login');
            }
            else {
                return $next($request);
            }
        }
        else if($role == 'driver') {
            
            if (auth()->guard('api-driver')->user() == '') {
                return response()->json(['message' => 'unauthenticated']);
            }
            else {
                return $next($request);
            }
        }
    }
}