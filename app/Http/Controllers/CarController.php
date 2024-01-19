<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        return view('cars.cars');
    }

    public function create() {
        return view('cars.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required|min:3',
            'emissions' => 'required',
            'gearbox' => 'required',
            'price_per_day' => 'required',
            'price_per_km' => 'required',
            'carImage1' => 'required|image',
            'carImage2' => 'nullable|image',
            'carImage3' => 'nullable|image',
            'carImage4' => 'nullable|image',
            'carImage5' => 'nullable|image',
            'carImage6' => 'nullable|image',
            'carImage7' => 'nullable|image',
            'carImage8' => 'nullable|image',
        ]);

        $carImages = [];
        for ($i = 1; $i <= 8; $i++) {
            $imageKey = 'carImage' . $i;

            if ($request->hasFile($imageKey)) {
                $carImages[$imageKey] = $request->file($imageKey)->store('carImages', 'public');
            } else {
                $carImages[$imageKey] = null;
            }
        }

        $data = array_merge($validated, $carImages);

        Car::create($data);

        return redirect()->route('home')->with('success', 'Created car successfully!');
    }
}
