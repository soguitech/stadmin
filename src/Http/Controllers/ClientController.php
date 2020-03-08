<?php


namespace Soguitech\Stadmin\Http\Controllers;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('stadmin.auth');
    }

}