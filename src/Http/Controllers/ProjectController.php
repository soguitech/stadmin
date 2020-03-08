<?php


namespace Soguitech\Stadmin\Http\Controllers;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('stadmin.auth');
    }

}