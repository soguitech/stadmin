<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    /**
     * Category constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.categories'));
    }

    /**
     * @return HasMany
     */
    public function blogs ()
    {
        return $this->hasMany(config('stadmin.models.blog'));
    }

}