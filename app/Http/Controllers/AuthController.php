<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register() {
        return Inertia::render('Auth/Register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'phone_number' => 'required|min:8|max:20',
            'email' =>'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        // Mail::to($user->email)
        // ->send(new WelcomeEmail($user));

        return redirect()->route('home')->with('success', 'Registered successfully!');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if(auth()->attempt($validated)){
            request()->session()->regenerate();

            return redirect()->route('home')->with('success', 'Loged in successfully!');
        };

        return redirect()->route('login')->withErrors([
            'email'=> "Failed to log in! Please try again!"
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Loged Out successfully!');
    }
}
