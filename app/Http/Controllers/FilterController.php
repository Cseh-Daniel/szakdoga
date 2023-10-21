<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class FilterController extends Controller
{

    public function index(){

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
