<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function comment(Requests\CommentRequest $request)
    {
        $ip = ['ip' => $request->ip()];
        $comment = Comment::create(array_merge($request->all(), $ip));
        return redirect()->back();
    }
}
