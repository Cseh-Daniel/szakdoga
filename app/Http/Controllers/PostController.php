<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return inertia("Posts/newPost");
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {

        ddd($request);

    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        //
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
