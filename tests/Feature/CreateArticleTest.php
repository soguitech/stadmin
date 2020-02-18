<?php

namespace Soguitech\Stadmin\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Soguitech\Stadmin\Models\Article;
use Soguitech\Stadmin\Tests\TestCase;
use Soguitech\Stadmin\Tests\User;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_users_can_create_a_article()
    {
        // To make sure we don't start with a Post
        $this->assertCount(0, Article::all());

        $author = factory(User::class)->create();

        $response = $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'body'  => 'My first fake body',
        ]);

        $this->assertCount(1, Article::all());

        tap(Article::first(), function ($article) use ($response, $author) {
            $this->assertEquals('My first fake title', $article->title);
            $this->assertEquals('My first fake body', $article->body);
            $this->assertTrue($article->author->is($author));
            $response->assertRedirect(route('articles.show', $article));
        });
    }

  /*  function a_article_requires_a_title_and_a_body()
    {
        $author = factory(User::class)->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => '',
            'body'  => 'Some valid body',
        ])->assertSessionHasErrors('title');

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'Some valid title',
            'body'  => '',
        ])->assertSessionHasErrors('body');
    }*/

    /** @test */
    function guests_can_not_create_articles()
    {
        // We're starting from an unauthenticated state
        $this->assertFalse(auth()->check());

        $this->article(route('articles.store'), [
            'title' => 'A valid title',
            'body'  => 'A valid body',
        ])->assertForbidden();
    }

    /** @test */
    function all_articles_are_shown_via_the_index_route()
    {
        // Given we have a couple of Posts
        factory(Article::class)->create([
            'title' => 'Post number 1'
        ]);
        factory(Article::class)->create([
            'title' => 'Post number 2'
        ]);
        factory(Article::class)->create([
            'title' => 'Post number 3'
        ]);

        // We expect them to all show up
        // with their title on the index route
        $this->get(route('articles.index'))
            ->assertSee('Post number 1')
            ->assertSee('Post number 2')
            ->assertSee('Post number 3')
            ->assertDontSee('Post number 4');
    }

    /** @test */
    function a_single_article_is_shown_via_the_show_route()
    {
        $post = factory(Article::class)->create([
            'title' => 'The single post title',
            'body'  => 'The single post body',
        ]);

        $this->get(route('articles.show', $post))
            ->assertSee('The single post title')
            ->assertSee('The single post body');
    }

}