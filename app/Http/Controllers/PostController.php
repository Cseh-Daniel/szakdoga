<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\County;
use App\Models\Post;
use App\Models\Profession;
use App\Traits\PostListTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use PostListTrait;

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the post.
     */
    public function index()
    {

        return $this->showPosts();
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): \Inertia\Response
    {
        return inertia('Posts/newPost', ['professions' => Profession::all(['id', 'name']), 'counties' => County::all(['id', 'name'])]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $post = $request->validate(Post::$createRules);

        $post['user_id'] = Auth::user()->id;

        $post['duration'] = $post['duration'] . ' ' . config('durationTypes')[$post['durationType']];
        $post = Post::create($post);

        return redirect('/posts/' . $post->id);
    }

    /**
     * Display the specified post.
     */
    public function show(int $id): \Inertia\Response
    {
        $post = Post::with('user')->with('profession')->with('county')->find($id);

        $comments = Comment::byPost($post['id'])->with('user')->get();

        return inertia('Posts/showPost', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit()
    {
        abort(404);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id == auth()->user()->id || auth()->user()->role_id == 1) {
            $req = $request->validate(Post::$updateRules);
            $post['text'] = $req['text'];
            ddd($post['text'], $req['text']);
            $post->save();

            return redirect('/posts/' . $post->id);
        }
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->user()->id || auth()->user()->role_id == 1) {
            $post->delete();
        }

        return redirect('home');
    }
}
