<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CarStoreRequest;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'ASC')->get()->map(function ($car) {
            if (auth()->user()) {
                $isLikedByUser = $car->likes()->where('user_id', auth()->id())->exists();
            }

            return [
                'id' => $car->id,
                'brand' => $car->brand,
                'model' => $car->model,
                'body_type' => $car->body_type,
                'fuel_type' => $car->fuel_type,
                'gearbox' => $car->gearbox,
                'emissions' => $car->emissions,
                'price_per_day' => $car->price_per_day,
                'price_per_km' => $car->price_per_km,
                'carImageURL' => $car->getFirstImageURL(),
                'likesCount' => $car->likes->count(),
                'isLikedByUser' => $isLikedByUser ?? false,
            ];
        });

        return Inertia::render('Cars/Cars', [
            'cars' => $cars,
        ]);
    }

    public function show($car_id)
    {
        $car = Car::find($car_id);
        $car['carImage1'] = $car->getFirstImageURL();

        $carImages = $car->getImageURLs();

        $car->likesCount = $car->likes->count();

        if (auth()->user()) {
            $authUser = auth()->user()->id;
            $user = User::find($authUser);
            $profilePhoto = $user->getImageURL();
        } else {
            $profilePhoto = asset(Storage::url('images/default-profile.png'));
        }

        $comments = Comment::where('car_id', $car_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $comments = $comments->map(function ($comment) {
            return [
                'comment' => $comment->comment,
                'profilePhoto' => $comment->user->getImageURL(),
                'name' => $comment->user->name,
                'user_id' => $comment->user->id,
                'id' => $comment->id,
                'car_id' => $comment->car_id,
                'editing' => false,
            ];
        });

        if (auth()->user()) {
            $car->isLikedByUser = $car->likes()->where('user_id', auth()->id())->exists();
        }

        return Inertia::render('Cars/Car', [
            'car' => $car,
            'carImages' => $carImages,
            'profilePhoto' => $profilePhoto,
            'comments' => $comments
        ]);
    }

    public function create()
    {
        return Inertia::render('Cars/CreateCar');
    }

    public function store(CarStoreRequest $request)
    {

        $validated = $request->validated();

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

        return redirect()->route('home')->with('message', 'Car created successfully!');
    }

    public function destroy($car_id)
    {
        if($car_id == null) {
            return redirect()->route('home')->with('message', 'Car not found!');
        }

        $car = Car::find($car_id);
        $car->delete();

        return redirect()->route('home')->with('message', 'Car deleted successfully!');
    }
}
