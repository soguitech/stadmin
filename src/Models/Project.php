<?php


namespace Soguitech\Stadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $guarded = [];

    /**
     * Project constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.projects'));
    }

    /**
     * @return BelongsTo
     */
    public function client ()
    {
        return $this->belongsTo(config('stadmin.models.project'));
    }
}
