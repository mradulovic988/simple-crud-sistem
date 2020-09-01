<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Adding mass assignment allow
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Don't guarded us
    protected $guarded = [];

    // Created article path
    public function path()
    {
        return route('articles.show', $this);
    } 

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
