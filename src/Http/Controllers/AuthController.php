<?php

namespace Soguitech\Stadmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Soguitech\Stadmin\Facades\Admin;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('stadmin.guest')->except('logout');
    }

    public function showLoginForm ()
    {
        if ($this->guard()->check()) {
            return redirect($this->redirectPath());
        }

        return view('stadmin::auth.login');
    }

    protected function redirectPath()
    {
       return route('stadmin.dash');
    }

    public function login(Request $request)
    {
        $this->loginValidator($request);

        $credentials = $request->only([$this->username(), 'password']);
        $remember = $request->get('remember', false);

        if ($this->guard()->attempt($credentials, $remember)) {
            return $this->sendLoginResponse($request);
        }

        return back()->withInput()->withErrors([
            $this->username() => $this->getFailedLoginMessage(),
        ]);
    }

    protected function loginValidator(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }

    protected function sendLoginResponse(Request $request)
    {
        $notification = array(
            'message' => 'Bienvenue !',
            'alert-type' => 'success'
        );

        $request->session()->regenerate();

        return redirect()->intended($this->redirectPath())->with($notification);
    }

    protected function username()
    {
        return config('stadmin.auth.username');
    }

    protected function guard()
    {
        return Admin::guard();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(route('stadmin.login'));
    }
}