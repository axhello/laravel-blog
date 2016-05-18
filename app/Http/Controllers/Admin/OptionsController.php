<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Options;
use App\Models\User;
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

    public function addUser()
    {
        return view('admin.options.addUser');
    }

    public function editUser()
    {
        $user = \Auth::user();
        $options = Options::first();
        $articles = Article::all();
        $comments = Comment::all();
        return view('admin.options.editUser',compact('user','articles','comments','options'));
    }

    public function edit(Requests\UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($user->save()) {
            return redirect('/admin/options/basic')->with('success','用户信息更新成功!');
        }
        return redirect()->back()->with('errors', '用户信息更新失败!');
    }
}
