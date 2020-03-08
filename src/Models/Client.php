<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Models\Auth\Admin;

class Client extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.clients'));
    }

    public function user ()
    {
        return $this->hasOne(config('stadmin.models.user'));
    }
}