<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::latest()->get();
        return view('admin.manages.category',compact('cates'));
    }

    public function store(Requests\CategoryRequest $request)
    {
        Category::create($request->all());
        return back();
    }

    public function edit($id)
    {
        $isCate = Category::findOrFail($id);
        return \Response::json([
           'message' => '200',
            'data' => $isCate
        ]);
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $cate = Category::findOrFail($id);
        $cate->name = $request->get('name');
        $cate->slug = $request->get('slug');
        $cate->sort = $request->get('sort');
        $cate->save();
        return back();
    }

    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        return back();
    }
}
