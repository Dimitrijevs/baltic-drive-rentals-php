<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(User $user) {
        $cars = Car::orderBy('created_at', 'DESC')->take(6)->get();

        return view('home')
            ->with('user', $user)
            ->with('cars', $cars);
    }
}
