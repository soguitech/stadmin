<?php


namespace Soguitech\Stadmin\Repositories;

use Soguitech\Stadmin\Models\Auth\Admin;
use Soguitech\Stadmin\Models\Role;

class UserRepository extends ResourceRepository
{
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

   /* public function getAll()
    {
        return $this->model->with('roles', 'statuts')->get();
    }*/

    public function checkUserHasGivenRole (Admin $user, Role $role)
    {
        if ($user->roles) {
            foreach ($user->roles as $userRole) {
                if ($userRole->id == $role->id) {
                    return true;
                }
            }
        }

        return false;
    }

}