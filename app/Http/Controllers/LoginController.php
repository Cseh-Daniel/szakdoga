<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
   /**
     * Show the form for login.
     */
    public function index()
    {
       return inertia("Auth/login");
    }

    /**
     * Logging in the user.
     */
    public function store(Request $request)
    {
        dd("store method");
    }


    /**
     * Logging out the logged in user
     */
    public function destroy()
    {
        dd("destroy method");
    }
}
