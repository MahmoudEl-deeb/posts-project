<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['body' => 'required|string']);

        $post->comments()->create([
            'body' => $request->body,
            
        ]);

        return back()->with('success', 'Comment added!');
    }

    public function destroy(Comment $comment)
    {

            $comment->delete();
            return back()->with('success', 'Comment deleted!');



    }
}
