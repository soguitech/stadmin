<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Soguitech\Stadmin\Models\Auth\Admin;

class Client extends Model
{
    protected $guarded = [];

    /**
     * Client constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.clients'));
    }

    /**
     * @return HasOne
     */
    public function user ()
    {
        return $this->hasOne(config('stadmin.models.user'));
    }
}