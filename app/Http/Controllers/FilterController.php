<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterByJobType(int $id)
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

        return inertia('index', ['posts' => Post::byProfession($prof_id)->with('user')->with('profession')->with('county')->get()]);
    }

    public function filterByYear()
    {
    }
}
