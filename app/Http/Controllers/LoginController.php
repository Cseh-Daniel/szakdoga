<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for login.
     */
    public function create()
    {
        return inertia('Auth/login');
    }

    /**
     * Logging in the user.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
