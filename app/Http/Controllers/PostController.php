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

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the post.
     */
    public function index()
    {
        return inertia('index', ['posts' => Post::with('user')->get()]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): \Inertia\Response
    {
        return inertia("Posts/newPost");
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $post = $request->validate(Post::$createRules);

        $post['user_id'] = Auth::user()->id;

        // ddd($post);

        $post = Post::create($post);
        //  a főoldal helyett a bejegyzés saját oldalára is dobhatna /posts/{id}
        return redirect("/posts/" . $post->id);
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post): \Inertia\Response
    {
        $comments = Comment::byPost($post['id'])->with('user')->get();
        $post['author'] = User::find($post['user_id'])['name'];
        return inertia("Posts/showPost", ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(/*Post $post*/)
    {

        // web.php-ban bekell állítani hogy az edit függvényre 404-et adjon
        // dd('edit post',$post);
        abort(404);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id == auth()->user()->id) {
            // dd('update post', $post, $request);
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
        $post->delete();
    }
}
