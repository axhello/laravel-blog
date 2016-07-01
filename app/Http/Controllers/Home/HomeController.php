<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Pages;
use App\Models\Category;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $pages = Pages::all();
        $cates = Category::all();
        view()->share('pages', $pages);
        view()->share('cates', $cates);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::first();
        $articles = $cate->articles()->latest()->simplePaginate(8);
        $results = Article::latest()->simplePaginate(10);
        return view('themes.moon.index', compact('articles', 'results'));
    }

    public function category(Category $category)
    {
        $articles = $category->articles()->latest()->simplePaginate(8);
        return view('themes.moon.categories', compact('category', 'articles'));
    }

    public function tag(Tag $tag)
    {
        $articles = $tag->articles()->simplePaginate(8);
        $pages = Pages::all();
        return view('themes.moon.tags', compact('tag', 'articles', 'pages'));
    }

    public function pages(Pages $slug)
    {
        $pages = Pages::all();
        return view('themes.moon.pages', compact('pages', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $slug = $article->getSlug();
        $prev_article = Article::find($this->getPrevArticleId($article->id));
        $next_article = Article::find($this->getNextArticleId($article->id));
        return view('themes.moon.post', compact('article', 'slug', 'options', 'prev_article', 'next_article'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $results = Article::search($keyword);
        return view('themes.default.search', compact('results'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function links()
    {
        $links = Link::all();
        return view('themes.default.links', compact('links'));
    }

    /**
     * 取得上一篇的文章id
     * @param $id
     * @return mixed
     */
    protected function getPrevArticleId($id)
    {
        return Article::where('id', '<', $id)->max('id');
    }

    /**
     * 取得下一篇的文章id
     * @param $id
     * @return mixed
     */
    protected function getNextArticleId($id)
    {
        return Article::where('id', '>', $id)->min('id');
    }
}
