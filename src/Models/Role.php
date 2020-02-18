<?php

namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Exceptions\GuardDoesNotMatch;
use Soguitech\Stadmin\Exceptions\RoleAlreadyExists;
use Soguitech\Stadmin\Exceptions\RoleDoesNotExist;
use Soguitech\Stadmin\Contracts\Permission;
use Soguitech\Stadmin\Guard;
use Soguitech\Stadmin\Traits\HasPermissions;
use Soguitech\Stadmin\Traits\RefreshesPermissionCache;

class Role extends Model implements \Soguitech\Stadmin\Contracts\Role {
    use HasPermissions, RefreshesPermissionCache;

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.roles'));
    }

    public static function create(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);

        if (static::where('name', $attributes['name'])->where('guard_name', $attributes['guard_name'])->first()) {
            throw RoleAlreadyExists::create($attributes['name'], $attributes['guard_name']);
        }

        return static::query()->create($attributes);
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            config('stadmin.models.permission'),
            config('stadmin.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        );
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['guard_name']),
            'model',
            config('stadmin.table_names.model_has_roles'),
            'role_id',
            config('stadmin.column_names.model_morph_key')
        );
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * @inheritDoc
     */
    public static function findByName(string $name, $guardName): \Soguitech\Stadmin\Contracts\Role
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('name', $name)->where('guard_name', $guardName)->first();

        if (! $role) {
            throw RoleDoesNotExist::named($name);
        }

        return $role;
    }

    /**
     * @inheritDoc
     */
    public static function findById(int $id, $guardName): \Soguitech\Stadmin\Contracts\Role
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('id', $id)->where('guard_name', $guardName)->first();

        if (! $role) {
            throw RoleDoesNotExist::withId($id);
        }

        return $role;
    }

    /**
     * @inheritDoc
     */
    public static function findOrCreate(string $name, $guardName): \Soguitech\Stadmin\Contracts\Role
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);

        $role = static::where('name', $name)->where('guard_name', $guardName)->first();

        if (! $role) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $role;
    }

    /**
     * @inheritDoc
     */
    public function hasPermissionTo($permission): bool
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
    }
}