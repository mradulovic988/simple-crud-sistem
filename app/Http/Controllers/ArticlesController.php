<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Render a list of resource
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

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
        // $article = new Article();

        // We can do this on this way
        // $validatedAttributes = request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // or on this way
        Article::create($this->validateArticle());

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // We can use it as an array
        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body')
        // ]);

        // Article::create($validatedAttributes);

        return redirect(route('articles.index'));
    }

    protected function validateArticle()
    {
        return  request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
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

        $article->update($this->validateArticle());

        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // We can do on this way
        // return redirect(route('articles.show', $article));

        return redirect($article->path());
    }

    public function delete()
    {
        // Delete the resource
    }
}
