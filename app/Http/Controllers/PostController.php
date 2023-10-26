<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Auth;
use App\Models\Post;
use App\Models\Profession;
use App\Models\County;
use App\Models\User;
use App\Traits\PostListTrait;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

        // return inertia('index', ['posts' => Post::with('user')->with('profession')->with('county')->paginate(7)]);
        return $this->showPosts();
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): \Inertia\Response
    {
        return inertia("Posts/newPost", ['professions' => Profession::all(['id', 'name']), 'counties' => County::all(['id', 'name'])]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $durationType = ['óra', 'nap', 'hét', 'hónap'];
        // ddd($request);
        $post = $request->validate(Post::$createRules);

        $post['user_id'] = Auth::user()->id;

        $post['duration'] = $post['duration'] . " " . $durationType[$post['durationType']];
        // dd($post);
        $post = Post::create($post);
        //  a főoldal helyett a bejegyzés saját oldalára is dobhatna /posts/{id}
        return redirect("/posts/" . $post->id);
    }

    /**
     * Display the specified post.
     */
    // public function show(Post $post): \Inertia\Response

    public function show(int $id): \Inertia\Response
    {
        $post = Post::with('user')->with('profession')->with('county')->find($id);

        $comments = Comment::byPost($post['id'])->with('user')->get();
        // ddd($post);
        // $post['author'] = User::find($post['user_id'])['name'];
        return inertia("Posts/showPost", ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit()
    {

        // 404 error response
        abort(404);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id == auth()->user()->id) {
            $req = $request->validate(Post::$updateRules);
            $post['text'] = $req['text'];
            $post->save();
            return redirect("/posts/" . $post->id);
        }
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        // dd($post);
        if ($post->user_id == auth()->user()->id) {
            $post->delete();
        }
        return redirect('home');
    }
}
