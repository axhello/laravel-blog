<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\Category;
use App\Options;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;
use YuanChao\Editor\EndaEditor;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::getCategoryAll();
        $cate = $cates->first();
        $articles = $cate->articles()->latest()->paginate(6);
        $options = Options::first();
        return view('home.index',compact('cates', 'articles', 'options'));
    }

    public function category(Category $category)
    {
        $cates = Category::getCategoryAll();
        $articles = $category->articles()->latest()->paginate(6);
        $options = Options::first();
        return view('home.category', compact('cates', 'articles', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $options = Options::first();
        $comments = $article->comments()->paginate(10);
        return view('home.show',compact('article', 'comments','options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $results = Article::Search($keyword);
        $options = Options::first();
        return view('home.search', compact('results', 'options'));
    }
}
