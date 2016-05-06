<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Comment;
use App\Options;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OptionsController extends Controller
{
    public function basic()
    {
        $options = Options::first();
        $articles = Article::all();
        $comments = Comment::all();
        return view('admin.options.basic', compact('options','articles','comments'));
    }

    public function create(Request $request)
    {
        $options = Options::create($request->all());
        if ($options) {
            return redirect()->back()->with('success','站点信息更新成功!');
        } else {
            return redirect()->back()->with('errors', '站点信息更新失败!');
        }
    }

    public function update(Request $request, $id)
    {
        $options = Options::findOrFail($id);
        $options->update($request->all());
        if ($options->save()) {
            return redirect()->back()->with('success','站点信息更新成功!');
        } else {
            return redirect()->back()->with('errors', '站点信息更新失败!');
        }
    }
}
