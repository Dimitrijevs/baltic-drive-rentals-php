<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function profile($id) {
        $user = User::find($id);

        $reservations = $user->reservations()->orderBy('created_at', 'desc')->get();

        $cars = [];
        foreach ($reservations as $reservation) {
            $cars[] = [
                'brand' => $reservation->car->brand,
                'model' => $reservation->car->model,
            ];
        }

        $user['avatar'] = $user->getImageURL();

        return Inertia::render("User/Profile", [
            'user' => $user,
            'reservations' => $reservations,
            'cars' => $cars,
        ]);
    }

    public function edit($id) {
        $user = User::find($id);
        $user['avatar'] = asset('storage/' . $user->avatar);

        return Inertia::render("User/Edit")->with('user', $user);
    }

    public function update(UserUpdateRequest $request) {
        $id = auth()->user()->id;
        $user = User::find($id);

        $validatedData = $request->validated();

        if (isset($validatedData['avatar'])) {
            $avatarPath = request()->file('avatar')->store('profile', 'public');
            $validatedData['avatar'] = $avatarPath;
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        }

        if (isset($validatedData['password']) && Hash::check(request()->old_password, $user->password)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        $user->update($validatedData);

        return redirect()->route('home')->with('message', 'Profile updated successfully!');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('home')->with('message', 'Profile deleted successfully');
    }
}
