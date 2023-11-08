<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    /**
     * Show the form for login.
     */
    public function index()
    {
        return inertia('Auth/login');
    }

    /**
     * Logging in the user.
     */
    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user=User::whereEmail($request['email'])->first();
            event(new Registered($user));

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login' => 'Nem található felhasználó a megadott adatokkal.',
        ]);
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
