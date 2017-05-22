<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {   
        $user_id = Auth::user()->id;
        
        $messages = [
            'comment_post.required' => 'Kolom komentar tidak boleh kosong',
            'comment_post.min' => 'Minimal Karakter 2',
        ];
        $this->validate($request, [
            'comment_post' => 'required|min:2',
        ], $messages);

        $post->addComment($request, $user_id);

        return back();
    }
}
