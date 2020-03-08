<?php


namespace Soguitech\Stadmin\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('stadmin.auth');
    }

    /**
     * @return Factory|View
     */
    public function dashboard ()
    {
        return view('stadmin::home');
    }
}