<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserAuthenticateRequest;

class AuthController extends Controller
{
    public function register() {
        $car = asset(Storage::url('carImages/99dLPzTUNUWqrqaTwWVKn3Tv5BRnsWlQpvXJUpfv.png'));

        return Inertia::render('Auth/Register', ['car' => $car]);
    }

    public function store(UserCreateRequest $request) {

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),]);

        // Mail::to($user->email)
        // ->send(new WelcomeEmail($user));

        return redirect()->route('home')->with('message', 'Registered successfully, please log in!');
    }

    public function login() {
        $car = asset(Storage::url('carImages/9SozCq3fikvLblFvmUka1k81ALsjl2kAUwj7XTBD.png'));

        return Inertia::render('Auth/Login', ['car' => $car]);
    }

    public function authenticate(UserAuthenticateRequest $request){

        if(auth()->attempt($request->validated())){
            request()->session()->regenerate();

            return redirect()->route('home')->with('message', 'Logged in successfully!');
        };

        return redirect()->route('login')->withErrors([
            'email'=> "Failed to log in! Please try again!"
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'Logged Out successfully!');
    }
}
