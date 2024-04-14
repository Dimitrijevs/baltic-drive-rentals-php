<?php

namespace App\Http\Controllers;

use App\Models\Car;

class LikeController extends Controller
{
    public function toggle(Car $car)
    {
        $car->likes()->toggle(auth()->id());

        return redirect()->back();
    }
}
