<?php


namespace Soguitech\Stadmin\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Soguitech\Stadmin\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('stadmin::articles.index', compact('articles'));
    }

    public function create ()
    {
        return view('stadmin::articles.create');
    }

    public function show(Article $article)
    {
        //$article = Article::findOrFail(request('article'));

        return view('stadmin::articles.show', compact('article'));
    }

    public function store()
    {
        // Let's assume we need to be authenticated
        // to create a new post

        if (!Auth::user()) {
            abort (403, 'Only authenticated users can create new posts.');
        }

        request()->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        // Assume the authenticated user is the post's author
        $author = Auth::user();

        $article = $author->articles()->create([
            'title'     => request('title'),
            'body'      => request('body'),
        ]);

        return redirect(route('articles.show', $article));
    }
}