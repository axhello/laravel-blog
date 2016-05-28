<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Options;
use App\Models\Pages;
use App\Models\Tag;
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
        $pages = Pages::all();
        return view('home.tags', compact('tag', 'articles', 'pages'));
    }
}
