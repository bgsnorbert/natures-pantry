<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginUserController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to login the user
        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }


        // regenerate the session token
        request()->session()->regenerate();

        // redirect
        return redirect('/');
    }
}
