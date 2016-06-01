<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Link;
use App\Models\Options;
use App\Models\Pages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::getCategoryAll();
        $cate = $cates->first();
        $articles = $cate->articles()->latest()->simplePaginate(8);
        $pages = Pages::all();
        return view('home.index', compact('cates', 'articles', 'pages'));
    }

    public function category(Category $category)
    {
        $cates = Category::getCategoryAll();
        $articles = $category->articles()->latest()->simplePaginate(8);
        $pages = Pages::all();
        return view('home.category', compact('cates', 'articles', 'pages'));
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
        $pages = Pages::all();
        $prev_article = Article::find($this->getPrevArticleId($article->id));
        $next_article = Article::find($this->getNextArticleId($article->id));
        return view('home.show', compact('article', 'slug', 'options', 'pages', 'prev_article', 'next_article'));
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
        $pages = Pages::all();
        return view('home.search', compact('results', 'pages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function links()
    {
        $links = Link::all();
        $pages = Pages::all();
        return view('home.links', compact('links', 'pages'));
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
