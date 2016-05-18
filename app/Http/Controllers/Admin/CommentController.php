<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(20);
        return view('admin.manages.comment', compact('comments'));
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $comment = Comment::destroy($id);
        if ($comment) {
            return back()->with('success','评论删除成功!');
        }
        return redirect()->back()->with('error','评论删除失败!');
    }
}
