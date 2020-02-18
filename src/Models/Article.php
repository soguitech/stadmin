<?php

namespace Soguitech\Stadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Article extends Model
{
    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    public function author() : MorphTo
    {
        return $this->morphTo();
    }

}