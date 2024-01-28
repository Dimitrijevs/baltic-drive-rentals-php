<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {
        $cars = Car::orderBy('created_at', 'DESC')
                ->take(6)
                ->select('id', 'brand', 'model', 'price_per_day', 'price_per_km', 'carImage1')
                ->get();

        $carsWithImageURLs = $cars->map(function ($car) {
            return [
                'id' => $car->id,
                'brand' => $car->brand,
                'model' => $car->model,
                'price_per_day' => $car->price_per_day,
                'price_per_km' => $car->price_per_km,
                'carImageURL' => $car->getFirstImageURL(),
            ];
        });

        $mazdaImage = asset(Storage::url('carImages/mqOL5OOM5wFxthOIcjS2fmW0E9AaBgOdo1TwcxhG.png'));

        $teslaImage = asset(Storage::url('carImages/rAV6sZsT5bpX3MO2pap9vV9KraaTiOpuyxbSCedx.png'));

        $getStartedURLs = array(
            asset(Storage::url('carImages/oKwpV0e3hCpHKnEWFstSVahuHbVi6zBlvYJQfN0p.png')),
            asset(Storage::url('carImages/kd9L6mMwKAdudsByqc1t9ROlA3UTfZdNRKV9Ya5b.png')),
            asset(Storage::url('carImages/Ha7jothspgWb9A5VbunRBIZBGnVQ661915v7zrjO.png'))
        );

        $parkingImage = asset(Storage::url('carImages/Fe1M3xCSQSrWjxNdJldxtMQ6wgQlVGlfh0c44JGH.png'));
    
        return Inertia::render('Home/Home', [
            'mazdaImage' => $mazdaImage,
            'teslaImage' => $teslaImage,
            'cars' => $carsWithImageURLs,
            'getStartedURLs' => $getStartedURLs,
            'parkingImage' => $parkingImage,
        ]);
    }
}
