<?php

namespace Soguitech\Stadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Soguitech\Stadmin\Models\Auth\Admin;

class Blog extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.blogs'));
    }

    public function author()
    {
        return $this->belongsTo(
            config('stadmin.models.user'),
            'author');
    }

    public function category ()
    {
        return $this->belongsTo(config('stadmin.models.category'));
    }

    public function tags ()
    {
        return $this->belongsToMany(
            config('stadmin.models.tag'),
            config('stadmin.table_names.blog_has_tag'),
            'blog_id',
            'tag_id'
        );
    }
}