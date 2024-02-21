<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {

        //new arriavals
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

        // start
        $mazdaImage = asset(Storage::url('carImages/wAjkoVEnYq4iVdsEiKWqvoECalR9xoRw6T2qgThF.png'));

        // 3.
        $teslaImage = asset(Storage::url('carImages/E8EEKMGHZahsuBqMp6wns0Qpacl1b3Tm5TAMZ3dh.png'));

        // carousel
        $getStartedURLs = array(
            asset(Storage::url('carImages/eSCfGBEsh2teeEt5TokKRvxWl21OTR2vcwc3fNiN.png')),
            asset(Storage::url('carImages/MJtpwZkQpuSM1RQyt3UEMbugdF3VwsO9o3vNvSuc.png')),
            asset(Storage::url('carImages/sEIt193zwxSBrMgIMpqc9OQILjZXfmPBeawgqZ4I.png'))
        );

        // almost end
        $parkingImage = asset(Storage::url('carImages/uA4X0QiwaQ7O7FhedZyyypqv5mSOmEAdOcw5K2wf.png'));

        return Inertia::render('Home/Home', [
            'mazdaImage' => $mazdaImage,
            'teslaImage' => $teslaImage,
            'cars' => $carsWithImageURLs,
            'getStartedURLs' => $getStartedURLs,
            'parkingImage' => $parkingImage,
        ]);
    }
}
