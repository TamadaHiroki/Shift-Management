<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateShift
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
        //ログインされてないユーザーがログイン後の画面遷移しょうとしたときにログイン画面に飛ばす
        if (Auth::guard('shiftAdmin')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                    return redirect()->guest('/shift/login');
            }
        }

        return $next($request);
    }
}
