<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.manages.tags', compact('tags'));
    }

    public function create(Requests\TagsRequest $request)
    {
        $tag = Tag::create($request->all());
        if ($tag) {
            return redirect()->back()->with('success', '添加成功!');
        }
        return back()->with('error', '添加失败!');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        if (!empty($tag)) {
            return response()->json(['status' => 'success', 'data' => $tag]);
        }
        return response()->json(['status' => 'error']);
    }

    public function update(Requests\TagsRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        if ($tag->save()) {
            return redirect()->back()->with('success', '更新成功!');
        }
        return back()->with('error', '更新失败!');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id)->delete();
        if ($tag) {
            return redirect()->back()->with('success', '删除成功!');
        }
        return back()->with('error', '删除失败!');
    }
}
