<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/', [HomeController::class, 'index'])->name('home');

// auth
//register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'store']);

//login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// user
//profile
Route::get('/profile/{user}', [UserController::class, 'profile'])->middleware('auth')->name('profile');

//edit
Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name('edit');
Route::put('/profile/{user}/edit', [UserController::class, 'update'])->name('update');

//delete
Route::delete('profile/{user}', [UserController::class, 'destroy'])->middleware('auth')->name('delete');


//terms
//show
Route::get('/terms', [TermController::class, 'index'])->name('terms');

//create
Route::post('/terms/create', [TermController::class, 'store'])->name('terms.create');

//edit
Route::put('/terms/{term}/edit', [TermController::class, 'update'])->name('terms.edit');

//delete
Route::delete('terms/{term}', [TermController::class, 'destroy'])->middleware('auth')->name('terms.delete');


//learn
//show
Route::get('/learn', [LearnController::class, 'index'])->name('learn');


//cars
// index
Route::get('/cars', [CarController::class, 'index'])->name('cars');

//create car
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/create', [CarController::class, 'store']);

//show
Route::get('/cars/{car}', [CarController::class, 'show'])->name('car.show');
Route::post('/cars/{car}', [ReservationController::class, 'store'])->name('reservation');


// Likes
// like
Route::post('/cars/{car}/like', [LikeController::class, 'toggle'])->name('like');

// unlike
Route::post('/cars/{car}/unlike', [LikeController::class, 'destroy'])->name('unlike');



// GET	/photos	index	photos.index
// GET	/photos/create	create	photos.create
// POST	/photos	store	photos.store
// GET	/photos/{photo}	show	photos.show
// GET	/photos/{photo}/edit	edit	photos.edit
// PUT/PATCH	/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy
