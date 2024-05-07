<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(ReservationStoreRequest $request) {
        
        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id;
        $reservation->car_id = $request->carId;
        $reservation->start_time = $request->start_time;
        $reservation->car_start_point = $request->car_start_point;
        $reservation->car_end_point = $request->car_end_point;
        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        $reservation->end_price = $request->end_price;
        $reservation->kilometers = $request->kilometers;
        $reservation->save();

        return redirect()->route('home')->with('message', 'Car rented successfully!');
    }
}
