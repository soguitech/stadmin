<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.categories'));
    }

    public function blogs ()
    {
        return $this->hasMany(config('stadmin.models.blog'));
    }

}