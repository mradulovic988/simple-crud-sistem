<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Render a list of resource
        $articles = Article::latest()->get();

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article) // We can pass an $id as well
    {
        // Show a single resource

        // $article = Article::findOrFail($id);
        // return $article;

        return view('articles.show', [ 'article' => $article ]);
    }

    public function create()
    {
        // Shows a view to create a resource
        return view('articles.create');
    }
 
    public function store()
    {
        // Persist the new resource
        $article = new Article();

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();
        return redirect('/articles');
    }

    public function edit(Article $article) // We can pass an $id as well
    {
        // Show a view to edit existing resource

        // $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) // We can pass an $id as well
    {
        // Persist the edited resource
        
        // $article = Article::find($id);

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/'.$article->id);
    }

    public function delete()
    {
        // Delete the resource
    }
}
