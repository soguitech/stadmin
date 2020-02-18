<?php


namespace Soguitech\Stadmin\Http\Controllers;


use Illuminate\Http\Request;
use Soguitech\Stadmin\Models\Permission;

class PermissionController extends Controller
{
    public function index ()
    {
        $permissions = Permission::all();

        return view('stadmin::permissions.index', compact('permissions'));

    }

    public function show (Permission $permission)
    {
        return view('stadmin::permissions.show', compact('permission'));

    }

    public function create ()
    {
        return view('stadmin::permissions.create');

    }

    public function store (Request $request)
    {
        $permission = Permission::create(['name' => $request->get('name')]);

        return redirect(route('permissions.show', $permission));

    }

}