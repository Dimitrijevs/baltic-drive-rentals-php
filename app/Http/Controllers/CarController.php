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
    public function index(Request $request)
    {
        $cars = Car::orderBy('created_at', 'ASC')
            ->select('id', 'brand', 'model', 'price_per_day', 'price_per_km', 'carImage1')
            ->paginate(9);

        $carsWithImageURLs = $cars->map(function ($car) {
            $car->carImage1 = asset($car->carImage1);
            $car->likesCount = $car->likes->count();
            $isLikedByUser = false;
            if (auth()->user()) {
                $isLikedByUser = $car->likes()->where('user_id', auth()->id())->exists();
            }
            return [
                'id' => $car->id,
                'brand' => $car->brand,
                'model' => $car->model,
                'price_per_day' => $car->price_per_day,
                'price_per_km' => $car->price_per_km,
                'carImageURL' => $car->carImage1,
                'likesCount' => $car->likesCount,
                'isLikedByUser' => $isLikedByUser,
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
            'comments'=> $comments
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
}
