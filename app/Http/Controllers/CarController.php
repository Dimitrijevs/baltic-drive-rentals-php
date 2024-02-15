<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request) {
        $cars = Car::orderBy('created_at', 'ASC')
            ->select('id', 'brand', 'model', 'price_per_day', 'price_per_km', 'carImage1')
            ->paginate(9);

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

        $carBrandsImages = array(
            asset("images/logos/audi.png"),
            asset("images/logos/bmw.png"),
            asset("images/logos/tesla.png"),
            asset("images/logos/toyota.png"),
            asset("images/logos/vw.png"),
        );
    
        return Inertia::render('Cars/Cars', [
            'carBrandsImages' => $carBrandsImages,
            'cars' => $carsWithImageURLs,
            'pagination' => $cars->links()->toHtml(),
        ]);
    }

    public function show($car_id) {
        $car = Car::find($car_id);
        $car['carImage1'] = $car->getFirstImageURL();

        $carImages = $car->getImageURLs();
        
        return Inertia::render('Cars/Car', [
            'car' => $car,
            'carImages' => $carImages,
        ]);
    }

    public function create() {
        return Inertia::render('Cars/Create');
    }

    public function store(Request $request) {

        dd(request());

        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'horsepower' => 'required',
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
