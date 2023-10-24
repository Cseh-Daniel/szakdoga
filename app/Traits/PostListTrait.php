<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait PostListTrait
{
    protected function showPosts(?Builder $posts = null)
    {
        $posts = $posts != null ? $posts->with('user')->with('profession')->with('county') : Post::with('user')->with('profession')->with('county');
        return inertia('index', ['posts' => $posts->paginate(7)]);
    }
}
