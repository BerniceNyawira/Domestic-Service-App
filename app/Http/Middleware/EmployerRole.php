<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
         // Check if the user is authenticated and has the role of "employer"
         if ($request->user() && $request->user()->role === 'employer') {
            return $next($request);
         }

         return redirect('/unauthorized');
    }

}
