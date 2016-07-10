<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
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
        if (Auth::guard('admin')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
		//if($guard == 'admin')	こっちのほうがいいかも
                    return redirect()->guest('/admin/login');	//return redirect()->guest($guard, '/admin/login');	こっちのほうがいいかも
            }
        }

        return $next($request);
    }
}
