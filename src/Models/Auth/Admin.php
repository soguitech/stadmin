<?php


namespace Soguitech\Stadmin\Models\Auth;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Models\Client;

class Admin extends Model implements AuthorizableContract, AuthenticatableContract
{
    use Authorizable, Authenticatable;

    protected $guard = 'admin';

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('stadmin.database.users'));

        parent::__construct($attributes);
    }

    public function client ()
    {
        return $this->hasOne(Client::class);
    }

    public function permisions()
    {
        return $this->belongsToMany(
            config('stadmin.models.permission'),
            config('stadmin.table_names.user_has_permissions'),
            'permission_id',
            'admin_id'
        );
    }

    public function roles()
    {
        return $this->belongsToMany(
            config('stadmin.models.role'),
            config('stadmin.table_names.user_has_roles'),
            'role_id',
            'admin_id'
        );
    }

    public function statuts ()
    {
        return $this->belongsTo(config('stadmin.models.statuts'));
    }
}