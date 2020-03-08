<?php


namespace Soguitech\Stadmin;

use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->guard()->user();
    }

    /**
     * @return mixed
     */
    public static function guard()
    {
        $guard = config('stadmin.auth.guard') ?: 'admin';

        return Auth::guard($guard);
    }
}