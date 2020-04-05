<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Soguitech\Stadmin\Repositories\PermissionRepository;
use Soguitech\Stadmin\Traits\HasRoles;

class Permission extends Model
{
    use HasRoles;

    protected $guarded = ['id'];

    public $timestamps = false;
    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    /**
     * Permission constructor.
     * @param PermissionRepository $permissionRepository
     * @param array $attributes
     */
   /* public function __construct()
    {
        $this->setTable(config('stadmin.table_names.permissions'));
        //$this->permissionRepository = $permissionRepository;
    }*/

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {

        //$permission = static::getPermissions(['name' => $attributes['name']])->first();
       /* $permission = $this->permissionRepository->getPermissions($attributes['name']);

        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['name']);
        }*/

        return $this->permissionRepository->create($attributes);

        //return static::query()->create($attributes);
    }


    /**
     * @return BelongsToMany
     */
    public function roles () : BelongsToMany
    {
        return $this->belongsToMany(
            config('stadmin.models.role'),
            config('stadmin.table_names.role_has_permissions'),
            'permission_id',
            'role_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function users ()
    {
        return $this->belongsToMany(
            config('stadmin.models.user'),
            config('stadmin.table_names.user_has_permissions'),
            'permission_id',
            'admin_id'
        );
    }

    public function findByName (string $name)
    {
        return $this->permissionRepository->findByName($name);

       /* if (! $permission) {
            throw PermissionDoesNotExist::create($name);
        }

        return $permission;*/
    }

    public function findById(int $id)
    {
        return $this->permissionRepository->findById($id);
       /* $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['id' => $id, 'guard_name' => $guardName])->first();

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }

        return $permission;*/
    }

    public function findOrCreate(string $name)
    {
        return $this->permissionRepository->findOrCreate($name);

        /*$guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();

        if (! $permission) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $permission;*/
    }
}