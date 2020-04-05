<?php


namespace Soguitech\Stadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    /**
     * Tag constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.tags'));
    }

    /**
     * @return HasMany
     */
    public function blogs ()
    {
        return $this->hasMany(config('stadmin.models.blog'));
    }

}