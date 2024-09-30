<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //validate the form
        $attributes = $request->validate([
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max: 254'],
            'email_verified_at' => ['nullable'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/meals');
       }
       
       
    //    public function update() {
       
       
    //    }
       
    //    public function destroy() {
       
    //    }

}

