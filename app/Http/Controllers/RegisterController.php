<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Auth/register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required', 'min:8'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        User::create($credentials);

        return redirect('/home')->with('reg_ok', 'Sikeres regisztráció!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
