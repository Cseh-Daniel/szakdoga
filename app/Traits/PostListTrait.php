<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;
// use Request;

// enum sortTypes: string
// {
//     case CREATEDASC = 'created_at, ASC';
//     case CREATEDDESC = 'created_at';
//     case YEARASC = 'year, ASC';
//     case YEARDESC = 'year, DESC';
// }

trait PostListTrait
{


    protected function showPosts(?Builder $posts = null)
    {
        $sort = $this->isSorted();

        $posts = $posts != null ? $posts->with('user')->with('profession')->with('county') : Post::with('user')->with('profession')->with('county');
        $posts = $sort != null ? $this->sortPosts($posts, $sort) : $this->sortPosts($posts);
        return inertia('index', ['posts' => $posts->paginate(5)->withQueryString()]);
    }

    // protected function isSorted(Request $request)
    protected function isSorted()
    {
        $sort = request()->validate([
            'sort' => ['nullable', 'integer', 'min:0', 'max:3']
        ]);
        $sort=$sort==null?0:$sort['sort'];
        // dd($sort,'isSorted');
        return $sort;
    }

    protected function sortPosts(Builder $posts, int $sort = 0)
    {

        //páratlan->növekvő
        $options = [
            "year;DESC",
            "year;ASC",
            "created_at;DESC",
            "created_at;ASC",
        ];

        $order = Str::of($options[$sort])->explode(';');
        // dd($sort);
        return $posts->orderBy($order[0], $order[1]);
        // ddd($posts);

    }
}
