<?php

namespace Soguitech\Stadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Soguitech\Stadmin\Models\Auth\Admin;

class Blog extends Model
{
    protected $guarded = [];

    /**
     * Blog constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('stadmin.table_names.blogs'));
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(
            config('stadmin.models.user'),
            'author');
    }

    /**
     * @return BelongsTo
     */
    public function category ()
    {
        return $this->belongsTo(config('stadmin.models.category'));
    }

    /**
     * @return BelongsToMany
     */
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