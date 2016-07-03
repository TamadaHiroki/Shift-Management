<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedUser
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
        //ログインしているのにログイン画面にいこうとした場合、ログイン後のページに飛ばす
        if (Auth::guard('user')->check()) {
            return redirect('/user/top');
        }

        return $next($request);
    }
}
