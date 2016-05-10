<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Pages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::latest()->paginate(15);
        return view('admin.pages.index',compact('pages'));
    }

    public function edit($id)
    {
        $pages = Pages::findOrFail($id);
        return view('admin/pages.edit', compact('pages'));
    }

    public function store(Requests\PagesRequest $request)
    {
        $pages = Pages::create($request->all());
        if ($pages) {
            return redirect('admin/pages')->with('success','创建页面成功');
        }
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function update(Requests\PagesRequest $request, $id)
    {
        $pages = Pages::findOrFail($id);
        $pages->update($request->all());
        if ($pages->save()) {
            return redirect('admin/pages')->with('success','更新页面成功');
        }
    }

    public function destroy($id)
    {
        $pages = Pages::findOrFail($id)->delete();
        if ($pages) {
            return redirect('admin/pages')->with('success','删除页面成功');
        }
    }
}
