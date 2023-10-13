<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Auth;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     */
    public function index()
    {

        return inertia('index',['posts'=>Post::with('user')->get()]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create() :\Inertia\Response
    {
        dd('create posts');
        return inertia("Posts/newPost");
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $post = $request->validate([
            'title' => ['required','string', 'min:5', 'max:30'],
            'text' => ['required','string', 'min:10', 'max:250'],
        ]);

        $post['user_id'] = Auth::user()->id;

        // ddd($post);

        $post=Post::create($post);
        //  a főoldal helyett a bejegyzés saját oldalára is dobhatna /posts/{id}
        return redirect("/posts/".$post->id);

    }

    /**
     * Display the specified post.
     */
    public function show(Post $post) : \Inertia\Response
    {
        $post['author']=User::find($post['user_id'])['name'];
        $comments=Comment::byPost($post['id'])->with('user')->get();
        return inertia("Posts/showPost",['post'=>$post,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        dd('edit post');
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

}
