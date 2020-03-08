<?php

namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Exceptions\GuardDoesNotMatch;
use Soguitech\Stadmin\Exceptions\RoleAlreadyExists;
use Soguitech\Stadmin\Exceptions\RoleDoesNotExist;
use Soguitech\Stadmin\Guard;
use Soguitech\Stadmin\Repositories\RoleRepository;
use Soguitech\Stadmin\Models\Permission;
use Soguitech\Stadmin\Traits\HasPermissions;
use Soguitech\Stadmin\Traits\RefreshesPermissionCache;

class Role extends Model {
    //use HasPermissions, RefreshesPermissionCache;

    protected $guarded = ['id'];
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * Role constructor.
     * @param RoleRepository $roleRepository
     * @param array $attributes
     */
    public function __construct(RoleRepository $roleRepository, array $attributes = [])
    {

        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.roles'));
        $this->roleRepository = $roleRepository;
    }

    public function create(array $attributes = [])
    {
        return $this->roleRepository->create($attributes);
       /* $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);

        if (static::where('name', $attributes['name'])->where('guard_name', $attributes['guard_name'])->first()) {
            throw RoleAlreadyExists::create($attributes['name'], $attributes['guard_name']);
        }

        return static::query()->create($attributes);*/
    }

    public function permissions()
    {
        return $this->belongsToMany(
            config('stadmin.models.permission'),
            config('stadmin.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        );
    }

    public function users()
    {
        return $this->belongsToMany(
            config('stadmin.models.user'),
            config('stadmin.table_names.user_has_roles'),
            'role_id',
            'admin_id'
        );
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function findByName(string $name)
    {
        return $this->roleRepository->findByName($name);

        /*$guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('name', $name)->where('guard_name', $guardName)->first();

        if (! $role) {
            throw RoleDoesNotExist::named($name);
        }

        return $role;*/
    }

    public function findById(int $id)
    {
        return $this->roleRepository->findById($id);
        /*$guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('id', $id)->where('guard_name', $guardName)->first();

        if (! $role) {
            throw RoleDoesNotExist::withId($id);
        }

        return $role;*/
    }

    public function findOrCreate(string $name)
    {
        return $this->roleRepository->findOrCreate($name);
       /* $guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('name', $name)->where('guard_name', $guardName)->first();

        if (! $role) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $role;*/
    }


   /* public function hasPermissionTo($permission): bool
    {
        $permissionClass = $this->getPermissionClass();

        if (is_string($permission)) {
            $permission = $permissionClass->findByName($permission, $this->getDefaultGuardName());
        }

        if (is_int($permission)) {
            $permission = $permissionClass->findById($permission, $this->getDefaultGuardName());
        }

        if (! $this->getGuardNames()->contains($permission->guard_name)) {
            throw GuardDoesNotMatch::create($permission->guard_name, $this->getGuardNames());
        }

        return $this->permissions->contains('id', $permission->id);
    }*/
}