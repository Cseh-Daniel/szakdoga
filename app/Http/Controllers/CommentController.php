<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //link change to /posts/{id}/comment
        $comment = $request->validate(Comment::$createRules);

        $comment['user_id'] = auth()->user()->id;
        // dd($comment);
        $comment = Comment::create($comment);

        return redirect('/posts/'.$comment->post_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id == auth()->user()->id || auth()->user()->role_id == 1) {
            $req = $request->validate(comment::$updateRules);
            $comment['text'] = $req['text'];
            $comment->save();

            return redirect('/posts/'.$comment->post_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id == auth()->user()->id || auth()->user()->role_id == 1) {
            $comment->delete();
        }

        return redirect('/posts/'.$comment->post_id);
    }
}
