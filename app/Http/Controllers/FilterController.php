<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\PostListTrait;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    use PostListTrait;

    public function index(Request $request)
    {

        $filters = $request->validate([
            'yearMin' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'yearMax' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'inYear' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'remote' => ['nullable', 'bool'],
            'jobType' => ['nullable', 'bool'],
            'county' => ['nullable', 'exists:counties,id'],
            'profession' => ['nullable', 'exists:professions,id'],
            'title' => ['nullable'],
        ]);

        $posts = Post::query();

        foreach ($filters as $key => $value) {

            switch ($key) {
                case 'yearMin':
                    $posts = $posts->byYear($value);
                    break;

                case 'yearMax':
                    $posts = $posts->byYear(0, $value);
                    break;

                case 'inYear':
                    $posts = $posts->where('year', $value);
                    break;

                case 'remote':
                    $posts = $posts->byRemote($value);
                    break;

                case 'jobType':
                    $posts = $posts->byJobType($value);
                    break;

                case 'county':
                    $posts = $posts->byCounty($value);
                    break;

                case 'profession':
                    $posts = $posts->byProfession($value);
                    break;

                case 'title':
                    $posts = $posts->where('title', 'like', '%'.$value.'%');
                    break;

                default:
                    return redirect('/home');
                    break;
            }
        }

        return $this->showPosts($posts);
    }
}
