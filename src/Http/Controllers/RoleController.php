<?php

namespace Soguitech\Stadmin\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Soguitech\Stadmin\Models\Permission;
use Soguitech\Stadmin\Models\Role;
use Soguitech\Stadmin\Repositories\RoleRepository;
use Soguitech\Stadmin\Repositories\UserRepository;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RoleController constructor.
     * @param RoleRepository $roleRepository
     * @param UserRepository $userRepository
     */
    public function __construct(RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $this->middleware('stadmin.auth');
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory|View
     */
    public function index ()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('stadmin::roles.index', compact('roles', 'permissions'));

    }

    /*public function show (Role $role)
    {
        $permissions = Permission::all();
        return view('stadmin::roles.show', compact('role', 'permissions'));

    }*/

    /**
     * @return Factory|View
     */
    public function create ()
    {
        return view('stadmin::roles.create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store (Request $request)
    {
        if ($this->roleRepository->findByName($request->get('name'))) {
            return response()->json('Un rôle du même nom existe déjà', 401);
        }
        $role = $this->roleRepository->create((array)strtoupper((string)$request->only('name')));
        $role->permissions()->sync($request->get('permissions'));

        return response()->json($role, 200);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse|Redirector
     */
    public function givePermissionTo (Request $request, Role $role)
    {
        $permission = Permission::findByName($request->get('name'));
        $role->givePermissionTo($permission);

        return redirect(route('roles.show', $role));

    }

    /**
     * @param $id
     */
    public function delete ($id)
    {
        $role = $this->roleRepository->getById($id);
        $users = $this->userRepository->getAll();

        foreach ($users as $user) {
            if ($this->userRepository->checkUserHasGivenRole($user, $role)) {
                $user->roles()->detach($role);
                $user->roles()->sync($this->roleRepository->getRole('GUEST'));
            }
        }

        $this->roleRepository->destroyById($id);
    }


    /**
     * @return JsonResponse
     */
    public function allRoles ()
    {
        $rolesData = [];
        $roles = $this->roleRepository->getAll();
        $associateUser = '';
        $associatePermissions = '';
        $action = '';

        foreach ($roles as $key) {
            foreach ($key->permissions as $permission) {
                $associatePermissions .= '<span class="badge">' . strtoupper($permission->name) . '</span>';
            }
            if ($key->users()->count()) {
                $associateUser .= '<ul class="list-unstyled team-info">';

                foreach($key->users as $user) {
                    if(is_null($user->avatar)) {
                        $associateUser .= '<li><img src="' . config('stadmin.default_avatar') . '" alt="Avatar"></li>';
                    } else {
                        $associateUser .= '<li><img src="' . stadmin_avatar_asset($user->avatar) . '" alt="Avatar"></li>';
                    }
                }

                $associateUser .= '</ul>';
            } else {
                $associateUser = '0';
            }


            $action .= '<button type="button" onclick="editForm('.$key->id.')" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="deleteData('.$key->id.')" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';

            array_push($rolesData, [
                'name' => strtoupper($key->name),
                'permission' => $associatePermissions,
                'user' => $associateUser,
                'action' => $action
            ]);

            $associatePermissions = '';
            $associateUser = '';
            $action = '';
        }

        return response()->json($rolesData, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit ($id)
    {
        return response()->json($this->roleRepository->getById($id), 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update (Request $request, $id)
    {
        if ($this->roleRepository->checkIfRoleExistWithNameAndDiffId($id, $request->get('name'))) {
            return response()->json('Un rôle qui à le même nom existe déjà', 401);
        }
        $role = $this->roleRepository->getById($id);

        $role->name = $request->get('name');
        $role->permissions()->sync($request->get('permissions'));
        $role->update();

        return response()->json($role, 200);
    }
}