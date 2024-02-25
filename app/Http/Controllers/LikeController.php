<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function store($car_id){

        dd($car_id);
        $user_id = request()->user();

        Like::create(
            [
                'user_id' => $user_id,
                'car_id' => $car_id
            ]
        );
    }
}
