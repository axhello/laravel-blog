<?php

namespace App\Http\Controllers\Home;

use App\Events\CommentNotifications;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function comment(Requests\CommentRequest $request)
    {
        Comment::commenting($request->all());
        $previousUrl = \URL::previous(); // 這是上一頁的網址
        $anchor = "#comments-list"; // 這是描點
        return redirect()->to($previousUrl.$anchor);
    }

    public function reply(Requests\CommentRequest $request)
    {
        Comment::commenting($request->all());
        $user = Comment::where('username', $request->reply_name)->firstOrFail();
        event(new CommentNotifications($user));
        $previousUrl = \URL::previous(); // 這是上一頁的網址
        $anchor = "#comments-list"; // 這是描點
        return redirect()->to($previousUrl.$anchor);
    }

    public function notice(Request $request)
    {
        $user = Comment::where('username', $request->name)->firstOrFail();
        event(new CommentNotifications($user));
    }
}
