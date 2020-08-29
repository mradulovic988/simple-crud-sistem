@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>
        
        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf
            @method('PUT') <!-- PUT, PATCH or DELETE -->
            
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" name="title" id="title" class="input" value="{{ $article->title }}">
                </div>
            </div>

            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt">{{ $article->excerpt }}</textarea>
                </div>
            </div>

            <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body">{{ $article->body }}</textarea>
                </div>
            </div>
            <div class="control">
                <button class="button is-link" name="submit">Submit</button>
            </div>

            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </form>
    </div>
</div>

@endsection