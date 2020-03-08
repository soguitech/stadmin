<?php


namespace Soguitech\Stadmin\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.projects'));
    }

    public function client ()
    {
        return $this->belongsTo(config('stadmin.models.project'));
    }
}
