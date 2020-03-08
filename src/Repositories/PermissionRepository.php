<?php


namespace Soguitech\Stadmin\Repositories;


use Soguitech\Repositories\ResourceRepository;
use Soguitech\Stadmin\Exceptions\PermissionAlreadyExists;
use Soguitech\Stadmin\Exceptions\PermissionDoesNotExist;

class PermissionRepository extends ResourceRepository
{
    /**
     * PermissionRepository constructor.
     */
    public function __construct()
    {
        $this->model = config('stadmin.models.permission');
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function findByName(string $name)
    {
        $permission = $this->getPermission($name);

        if (! $permission) {
            throw PermissionDoesNotExist::create($name);
        }

        return $permission;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        $permission = $this->getById($id);

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id);
        }

        return $permission;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function findOrCreate(string $name)
    {
        $permission = $this->getPermission($name);

        if (! $permission) {
            return $this->store(['name' => $name]);
        }

        return $permission;
    }

    /**
     * @param string $params
     * @return mixed
     */
    public function getPermission (string $params)
    {
        return $this->model->with('roles')->where('name', $params)->first();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create (array $attributes)
    {
        $permission = $this->getPermission($attributes['name']);

        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['name']);
        }

        return $this->store($attributes);
    }
}