<?php


namespace Soguitech\Stadmin\Middlewares;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Soguitech\Stadmin\Facades\Admin;


class StadminAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return RedirectResponse|Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Admin::guard($guard)->check()) {
            return $next($request);
        }

        return redirect(route('stadmin.showLoginForm'));
    }
}