<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!session('isLogin')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['msg'=>'未登录！', 'erroCode'=>'401']);
            } else {
                return redirect()->route('user.login');
            }

        }

        return $next($request);
    }
}
