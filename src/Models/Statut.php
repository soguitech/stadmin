<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statut extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    /**
     * Statut constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.statuts'));
    }

    /**
     * @return HasMany
     */
    public function admins ()
    {
        return $this->hasMany(config('stadmin.models.users'));
    }

}