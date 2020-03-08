<?php


namespace Soguitech\Stadmin\Traits;


use Illuminate\Database\Eloquent\Relations\MorphMany;
use Soguitech\Stadmin\Models\Blog;

trait HasArticles
{
    /*public function articles()
    {
        return $this->morphToMany(Blog::class, 'author');
    }*/

    public function articles(): MorphMany
    {
        return $this->morphMany(
            config('stadmin.models.article'), 'author'
        );
    }

    public function createArticle ($data)
    {
        $this->articles()->create($data);
    }

}