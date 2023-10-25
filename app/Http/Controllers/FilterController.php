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
        //sorting még kelleni fog

        $filters = $request->validate([
            'yearMin' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'yearMax' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'inYear' => ['nullable', 'integer', 'min:2000', 'max:2025'],
            'remote' => ['nullable', 'bool'],
            'jobType' => ['nullable', 'bool'],
            'county' => ['nullable', 'exists:counties,id'],
            'profession' => ['nullable', 'exists:professions,id']
        ]);

        // $sort = $request->validate([
        //     'sort'=>['nullable','integer','min:0','max:3']
        // ]);

        // $sort= $this->isSorted($request);
        // $sort= $this->isSorted();

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

                case 'jobType': //trainee
                    $posts = $posts->byJobType($value);
                    break;

                case 'county':
                    $posts = $posts->byCounty($value);
                    break;

                case 'profession':
                    $posts = $posts->byProfession($value);
                    break;

                default:
                    return redirect("/home");
                    break;
            }
        }

        return $this->showPosts($posts);
    }
}
