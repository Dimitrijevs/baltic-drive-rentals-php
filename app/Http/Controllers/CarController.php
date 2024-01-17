<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        return view('cars.cars');
    }

    public function create() {
        return view('cars.create');
    }

    public function store() {
        dd(request());
    }
}
