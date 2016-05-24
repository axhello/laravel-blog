<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::latest()->get();
        return view('admin.manages.category', compact('cates'));
    }

    public function store(Requests\CategoryRequest $request)
    {
        $cate = Category::create($request->all());
        if ($cate) {
            return back()->with('success', '添加成功!');
        }
        return back()->with('error', '添加失败!');
    }

    public function edit($id)
    {
        $isCate = Category::findOrFail($id);
        if (!empty($isCate)) {
            return response()->json(['status' => 'success', 'data' => $isCate]);
        }
        return response()->json(['status' => 'error']);
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $cate = Category::findOrFail($id);
        $cate->name = $request->name;
        $cate->slug = $request->slug;
        $cate->sort = $request->sort;
        if ($cate->save()) {
            return redirect()->back()->with('success', '更新成功!');
        }
        return back()->with('error', '更新失败!');
    }

    public function destroy($id)
    {
        $cate = Category::findOrFail($id)->delete();
        if ($cate) {
            return redirect()->back()->with('success', '删除成功!');
        }
        return back()->with('error', '删除失败!');
    }
}
