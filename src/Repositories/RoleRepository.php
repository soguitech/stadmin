<?php

namespace Soguitech\Stadmin\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Exceptions\RoleAlreadyExists;
use Soguitech\Stadmin\Exceptions\RoleDoesNotExist;
use Soguitech\Stadmin\Models\Role;

class RoleRepository extends ResourceRepository
{
    /**
     * RoleRepository constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|mixed|Role|Role[]
     */
    public function getById(int $id)
    {
        return $this->model->with('permissions', 'users')->findOrFail($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create (array $attributes)
    {
        if ($this->getRole($attributes['name'])) {
            throw RoleAlreadyExists::create($attributes['name']);
        }

        return $this->store($attributes);
    }

    /**
     * @param string $name
     * @return Builder|Model|object|Role|null
     */
    public function findByName (string $name)
    {
       // $role = $this->getRole($name);

       /* if (!$role) {
            throw RoleDoesNotExist::named($name);
        }*/

        return $this->getRole($name);
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|mixed|Role|Role[]
     */
    public function findById (int $id)
    {
        $role = $this->getById($id);

        if (! $role) {
            throw RoleDoesNotExist::withId($id);
        }

        return $role;
    }

    /**
     * @param $id
     * @param $name
     * @return mixed
     */
    public function checkIfRoleExistWithNameAndDiffId ($id, $name)
    {
        return $this->model->where('name', strtoupper($name))->where('id', '!=', $id)->first();
    }

    /**
     * @param string $name
     * @return Builder|Model|mixed|object|Role|null
     */
    public function findOrCreate(string $name)
    {
        $permission = $this->getRole($name);

        if (! $permission) {
            return $this->store(['name' => $name]);
        }

        return $permission;
    }

    /**
     * @param string $params
     * @return Builder|Model|object|Role|null
     */
    public function getRole (string $params)
    {
        return $this->model->with('permissions')->where('name', $params)->first();
    }
}