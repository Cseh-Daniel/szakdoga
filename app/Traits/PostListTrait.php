<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

enum sortTypes: string
{
    case CREATEDASC = 'created_at, ASC';
    case CREATEDDESC = 'created_at';
    case YEARASC = 'year, ASC';
    case YEARDESC = 'year, DESC';
}

trait PostListTrait
{


    protected function showPosts(?Builder $posts = null,?sortTypes $sort=sortTypes::CREATEDDESC)
    {
        $posts = $posts != null ? $posts->with('user')->with('profession')->with('county') : Post::with('user')->with('profession')->with('county');
        $posts = $this->sortPosts($posts,$sort);
        return inertia('index', ['posts' => $posts->paginate(7)]);
    }

    protected function sortPosts(Builder $posts, sortTypes $sort)
    {

        return $posts->orderBy($sort->value);
    }
}
