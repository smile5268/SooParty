<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('adminLogin')) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
