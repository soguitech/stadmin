<?php


namespace Soguitech\Stadmin\Repositories;


use Soguitech\Repositories\ResourceRepository;
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

    public function create (array $attributes)
    {
        if ($this->getRole($attributes['name'])) {
            throw RoleAlreadyExists::create($attributes['name']);
        }

        return $this->store($attributes);
    }

    public function findByName (string $name)
    {
        $role = $this->getRole($name);

        if (!$role) {
            throw RoleDoesNotExist::named($name);
        }

        return $role;
    }

    public function findById (int $id)
    {
        $role = $this->getById($id);

        if (! $role) {
            throw RoleDoesNotExist::withId($id);
        }

        return $role;
    }

    public function findOrCreate(string $name)
    {
        $permission = $this->getRole($name);

        if (! $permission) {
            return $this->store(['name' => $name]);
        }

        return $permission;
    }

    public function getRole (string $params)
    {
        return $this->model->with('permissions')->where('name', $params)->first();
    }



}