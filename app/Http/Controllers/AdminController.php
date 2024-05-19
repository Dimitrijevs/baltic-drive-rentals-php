<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Term;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $admins = User::where('is_admin', true)->count();
        $cars = Car::all()->count();
        $terms = Term::all()->count();
        $comments = Comment::all()->count();
        $reservations = Reservation::all()->pluck('end_price');

        $money = 0;
        foreach ($reservations as $reservation) {
            $money += $reservation;
        }
        $money = round($money);

        if (auth()->user()->is_admin) {
            return Inertia::render(
                'Admin/Panel',
                ['users' => $users, 'cars' => $cars, 'admins' => $admins, 'terms' => $terms, 'comments' => $comments, 'money' => $money]
            );
        }

        return redirect()->route('home')->with('message', 'You are not an admin!');
    }

    public function carsTable()
    {
        $cars = Car::paginate(10);

        return Inertia::render('Admin/Cars', ['cars' => $cars]);
    }

    public function carsCharts()
    {
        $cars = Car::all();

        $carsGroupedByYear = $cars->groupBy('year');

        $carsCountByYear = $carsGroupedByYear->map(function ($carsInYear) {
            return $carsInYear->count();
        });

        return Inertia::render('Admin/CarsCharts', ['carsCountByYear' => $carsCountByYear]);
    }
}
