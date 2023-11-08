<?php

namespace App\Http\Controllers;

//ha nem starter kitet használtál akkor
use Illuminate\Auth\Events\Registered;

use App\Models\User;
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
            'name' => ['required', 'min:8'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user=User::create($credentials);

        //triggering send email verification notification
        event(new Registered($user));

        //ezt lehet, hogy lekell cserélni hogy az email megerősítésről szóljon
        return redirect('/login')->with('reg_ok', 'Sikeres regisztráció!');
    }


    public function verifyNotice(){
        return inertia('Auth/verifyEmail');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/home');
    }

}
