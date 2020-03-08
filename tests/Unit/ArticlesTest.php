<?php


namespace Soguitech\Stadmin\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Soguitech\Stadmin\Models\Blog;
use Soguitech\Stadmin\Tests\TestCase;
use Soguitech\Stadmin\Tests\User;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_article_has_a_title()
    {
        $article = factory(Blog::class)->create(['title' => 'Fake Title']);
        $this->assertEquals('Fake Title', $article->title);
    }


    /** @test */
    /*function a_article_has_a_body()
    {
        $article = factory(Blog::class)->create([
            "body" => "Fake Body"
        ]);
       $this->assertEquals('Fake Title', $article->body);
    }*/

    /** @test */
    /*function a_article_has_an_author_id()
    {
        // Note that we are not assuming relations here, just that we have a column to store the 'id' of the author
        $article = factory(Blog::class)->create(['author_id' => 'Fake\Admin']); // we choose an off-limits value for the author_id so it is unlikely to collide with another author_id in our tests
        $this->assertEquals(999, $article->author_id);
    }*/

    /** @test */
  /* function a_article_has_an_author_type()
    {
        $article = factory(Blog::class)->create(['author_type' => 'Fake\User']);
        $this->assertEquals('Fake\User', $article->author_type);
    }*/

    /** @test */
    function a_article_belongs_to_an_author()
    {
        // Given we have an author
        $author = factory(\Soguitech\Stadmin\Tests\User::class)->create();
        // And this author has a Post
        $author->articles()->create([
            'title' => 'My first fake post',
            'body'  => 'The body of this fake post',
        ]);

        $this->assertCount(1, Blog::all());
        $this->assertCount(1, $author->articles);

        // Using tap() to alias $author->posts()->first() to $post
        // To provide cleaner and grouped assertions
        tap($author->articles()->first(), function ($post) use ($author) {
            $this->assertEquals('My first fake post', $post->title);
            $this->assertEquals('The body of this fake post', $post->body);
            $this->assertTrue($post->author->is($author));
        });
    }

}