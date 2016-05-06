<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\Options;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index($id)
    {
        $article = Article::find($id);
        return $article->tags();
    }

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->paginate(6);
        $options = Options::first();
        return  view('home.tags', compact('tag', 'articles','options'));
    }
}
