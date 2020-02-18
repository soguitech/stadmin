<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Soguitech\Stadmin\Exceptions\PermissionDoesNotExist;
use Soguitech\Stadmin\Guard;
use Soguitech\Stadmin\PermissionRegistrar;
use Soguitech\Stadmin\Traits\HasRoles;

class Permission extends Model implements \Soguitech\Stadmin\Contracts\Permission
{
    use HasRoles;

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.permissions'));
    }

    public static function create(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);

       // dd(Guard::getDefaultName(static::class));

        $permission = static::getPermissions(['name' => $attributes['name'], 'guard_name' => $attributes['guard_name']])->first();

        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['name'], $attributes['guard_name']);
        }

       // dd($attributes);

        return static::query()->create($attributes);
    }

    /**
     * @return BelongsToMany|MorphToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('stadmin.models.role'),
            config('stadmin.table_names.role_has_permissions'),
            'permission_id',
            'role_id'
        );
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['guard_name']),
            'model',
            config('stadmin.table_names.model_has_permissions'),
            'permission_id',
            config('stadmin.column_names.model_morph_key')
        );
    }


    /**
     * @inheritDoc
     */
    public static function findByName(string $name, $guardName): \Soguitech\Stadmin\Contracts\Permission
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();
        if (! $permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }

        return $permission;
    }

    /**
     * @inheritDoc
     */
    public static function findById(int $id, $guardName): \Soguitech\Stadmin\Contracts\Permission
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['id' => $id, 'guard_name' => $guardName])->first();

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }

        return $permission;
    }

    /**
     * @inheritDoc
     */
    public static function findOrCreate(string $name, $guardName): \Soguitech\Stadmin\Contracts\Permission
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();

        if (! $permission) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $permission;
    }

    /**
     * @param array $params
     * @return mixed
     */
    protected static function getPermissions(array $params = [])
    {
        return app(PermissionRegistrar::class)
            ->setPermissionClass(static::class)
            ->getPermissions($params);
    }
}