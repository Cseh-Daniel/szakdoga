<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
    public function authenticate(Request $request): RedirectResponse
    {

        // dd($request->email,$request->password,$request);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Nem található felhasználó a megadott adatokkal.',
        ])->onlyInput('email');
    }

    /**
     * Logging out the logged in user
     */

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
