<?php


namespace Soguitech\Stadmin\Middlewares;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Soguitech\Stadmin\Facades\Admin;

class StadminGuest
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return RedirectResponse|Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Admin::guard($guard)->check()) {
            return redirect(route('stadmin.dash'));
        }

        return $next($request);
    }
}