<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
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
        Comment::destroy($id);
        return redirect()->back();
    }
}
