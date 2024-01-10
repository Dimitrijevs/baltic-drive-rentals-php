<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(User $user) {
        return view('terms.terms', compact('user'));
    }

    public function create() {
        return view('terms.create');
    }

    public function store() {
        dd(request());
        return redirect()->route('home')->with('success', 'Term added successfully!');
    }
}
