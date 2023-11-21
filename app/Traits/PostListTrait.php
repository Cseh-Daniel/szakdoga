<?php

namespace App\Traits;

use App\Models\County;
use App\Models\Post;
use App\Models\Profession;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait PostListTrait
{
    protected function showPosts(Builder $posts = null)
    {
        $sort = $this->isSorted();

        $posts = $posts != null ? $posts->with('user')->with('profession')->with('county') : Post::with('user')->with('profession')->with('county');
        $posts = $sort != null ? $this->sortPosts($posts, $sort) : $this->sortPosts($posts);

        return inertia('index', ['posts' => $posts->paginate(5)->withQueryString(), 'counties' => County::all(), 'professions' => Profession::all()]);
    }

    protected function isSorted()
    {
        $sort = request()->validate([
            'sort' => ['nullable', 'integer', 'min:0', 'max:3'],
        ]);
        $sort = $sort == null ? 0 : $sort['sort'];

        return $sort;
    }

    protected function sortPosts(Builder $posts, int $sort = 0)
    {

        $options = [
            'year;DESC',
            'year;ASC',
            'created_at;DESC',
            'created_at;ASC',
        ];

        $order = Str::of($options[$sort])->explode(';');

        return $posts->orderBy($order[0], $order[1]);

    }
}
