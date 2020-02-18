<?php


namespace Soguitech\Stadmin\Http\Controllers;


use Illuminate\Http\Request;
use Soguitech\Stadmin\Models\Permission;
use Soguitech\Stadmin\Models\Role;

class RoleController extends Controller
{
    public function index ()
    {
        $roles = Role::all();

        return view('stadmin::roles.index', compact('roles'));

    }

    public function show (Role $role)
    {
        $permissions = Permission::all();
        return view('stadmin::roles.show', compact('role', 'permissions'));

    }

    public function create ()
    {
        return view('stadmin::roles.create');

    }

    public function store (Request $request)
    {
        $roles = Role::create(['name' => $request->get('name')]);

        return redirect(route('roles.show', $roles));
    }

    public function givePermissionTo (Request $request, Role $role)
    {
        $permission = Permission::findByName($request->get('name'), null);
        $role->givePermissionTo($permission);

        return redirect(route('roles.show', $role));

    }


}