<?php

namespace App\Http\Middleware;

use Closure;
use Cart;
use Auth;

class DatHangLoginMiddleware
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
        if (Auth::check()) {
            if (Cart::count() !=0) {
                return $next($request);
            }
            else {
                return redirect()->route('page.trangchu');
            }
        } else {
            return redirect()->route('page.login');
        }
    }
}
