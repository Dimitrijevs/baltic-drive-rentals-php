<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile($id) {
        $user = User::find($id);

        $user['avatar'] = $user->getImageURL();
        $user['created_at'] = $user['created_at']->format('d.m.Y');

        return Inertia::render("User/Profile")->with('user', $user);
    }

    public function edit($id) {
        $user = User::find($id);
        $user['avatar'] = asset('storage/' . $user->avatar);

        return Inertia::render("User/Edit")->with('user', $user);
    }

    public function update(){
        $id = auth()->user()->id;

        $user = User::find($id);
        $validated = [];

        if (request()->has('name')) {
            $validated = request()->validate([
                'name' => 'required|min:3|max:40',
            ]);
        }

        if (request()->has('phone_number')) {
            $validated = request()->validate([
                'phone_number' => 'required|min:8|max:20',
            ]);
        } 

        if (request()->has('email')) {
            $validated = request()->validate([
                'email' => 'required|email|unique:users,email',
            ]);
        }

        if (request()->has('avatar')) {
            $validated = request()->validate([
                'avatar' => 'required|image',
            ]);

            $avatarPath = request()->file('avatar')->store('profile', 'public');
            $validated['avatar'] = $avatarPath;

            if($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        };

        if (request()->has('password') && Hash::check(request()->old_password, $user->password)) {
            request()->validate([
                'old_password' => 'required',
                'password' => 'required|min:3|confirmed',
            ]);

            $user->update([
                'password' => Hash::make(request()->password),
            ]);

            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        } else {
            return redirect()->route('home')->with('message', 'Profile was not updated');
        }

        $user->update($validated);

        return redirect()->route('home')->with('message', 'Profile updated successfully!');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('home')->with('message', 'Profile deleted successfully');
    }
}
