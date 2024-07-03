<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth::check() && Auth::user()->is_admin) {
            \Log::info('Admin user authenticated.');
            return $next($request);
        }
        \Log::info('Non-admin user attempted to access admin route.');
        return redirect('/');
    }
    

}