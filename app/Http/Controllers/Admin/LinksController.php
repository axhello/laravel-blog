<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public function links()
    {
        $links = Link::all();
        return view('admin.manages.links', compact('links'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $links = Link::create($request->all());
        return redirect()->back()->with('success','添加成功');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $links = Link::findOrFail($id);
        if (!empty($links)) {
            return response()->json([
                'status' => 'success',
                'data' => $links
            ]);
        } else {
            return response()->json([
                'status' => 'errors',
                'data' => $links
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $links = Link::findOrFail($id);
        $links->update($request->all());
        if ($links->save()) {
            return redirect()->back()->with('success','更新成功!');
        } else {
            return redirect()->back()->with('errors','更新失败!');
        }
    }

    public function destroy($id)
    {
        $links = Link::findOrFail($id)->delete();
        if ($links) {
            return redirect()->back()->with('success','删除成功!');
        } else {
            return redirect()->back()->with('errors','删除失败!');
        }
    }
}
