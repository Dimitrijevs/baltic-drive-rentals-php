<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile() {
        return view("users.profile")->with('user', auth()->user());
    }

    public function edit() {
        return view("users.edit")->with('user', auth()->user());
    }

    public function update(Request $request){

        $validated = [];
        $user = auth()->user();

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

        if (request()->has('password') && Hash::check($request->old_password, $user->password)) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|min:3|confirmed',
            ]);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('home')->with('success', 'Password updated successfully');
        }

        $user->update($validated);

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }

    public function destroy() {
        User::find(auth()->user()->id)->delete();

        return redirect()->route('home')->with('success', 'Profile deleted successfully');
    }
}