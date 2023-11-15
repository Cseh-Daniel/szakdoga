<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
            'name' => ['required', 'min:4', 'max:25'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = User::create($credentials);

        //triggering send email verification notification
        event(new Registered($user));

        //ezt lehet, hogy lekell cserélni hogy az email megerősítésről szóljon
        return redirect()->route('login')->with('data', 'Sikeres regisztráció! Megerősítő e-mail elküldve.');
    }

    public function verificationNotice()
    {

        if (! Auth::user()->hasVerifiedEmail()) {
            return inertia('Auth/verifyEmail');
        } else {
            return redirect()->route('home');
        }
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/home');
    }

    public function resendVerification()
    {
        if (! Auth::user()->hasVerifiedEmail()) {
            event(new Registered(Auth::user()));
        } else {
            return redirect()->route('home');
        }
    }
}
