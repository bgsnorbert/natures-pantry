<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required', 'min:1', 'max:255'],
            'last_name' => ['required', 'min:1', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::min(6)->letters()->numbers()->max(255), 'confirmed'],
        ]);

        // create the user
        $user = User::create($validatedAttributes);

        // log in
        Auth::login($user);

        // redirect
        return redirect('/products');
    }
}
