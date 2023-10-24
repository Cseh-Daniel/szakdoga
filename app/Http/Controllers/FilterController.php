<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\PostListTrait;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class FilterController extends Controller
{
    use PostListTrait;

    public function index(Request $request)
    { //sorting még kelleni fog
        $queryString = $request->collect();
        $posts = Post::query();

        foreach ($queryString as $key => $value) {

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

                default:
                    $posts = $posts->all();
                    break;
            }
        }


        // if (isset($queryString['adat'])) {
        //     dd('adat: ' . $queryString['adat']);
        // }
        // return $posts;

        // return inertia('index', ['posts' => $posts->with('user')->with('profession')->with('county')->paginate(3)]);

            return $this->showPosts($posts);
    }

    public function filterByJobType(Boolean $type)
    {
    }

    public function filterByRemote()
    {
    }

    public function filterByCounty()
    {
    }

    public function filterByProfession(int $prof_id)
    {
        //ellenörzés get változók alapján és query-k adogatása egymásnak.
        // /posts/filter?profession_id=9&trainee=true&county_id=5
        // query string a $request->param vagy $request->input('param') link:
        //      https://laracasts.com/discuss/channels/laravel/get-url-query-parameters
        return inertia('index', ['posts' => Post::byRemote(null)->with('user')->with('profession')->with('county')->get()]);
    }

    public function filterByYear()
    {
    }
}
