<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationController extends Controller
{
    public function store(ReservationStoreRequest $request) {

        $validated = $request->validated();

        $user_id = auth()->user()->id;
        $car_id = $request->carId;

        $validated['user_id'] = $user_id;
        $validated['car_id'] = $car_id;

        Reservation::create($validated);

        return redirect()->route('home')->with('message', 'Car rented successfully!');
    }
}
