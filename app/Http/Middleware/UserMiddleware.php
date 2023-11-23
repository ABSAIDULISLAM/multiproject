<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (auth()->user()->role_as == '2') {
                return $next($request);
            } else {
                return back()->with('error', 'Access Denied.! As you are not an User.');
            }
        } else {
            return back()->with('error', 'You Have to Log in First');
        }
    }
}
