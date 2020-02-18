<?php

namespace Soguitech\Stadmin\Database\Factories;

use Soguitech\Stadmin\Models\Article;
use Faker\Generator as Faker;
use Soguitech\Stadmin\Tests\User;

$factory->define(Article::class, function (Faker $faker) {
    $author = factory(User::class)->create();

    return [
        'title'         => $faker->words(3),
        'body'          => $faker->paragraph,
        'author_id'     => $author->id,
        'author_type'   => get_class($author),
    ];
});