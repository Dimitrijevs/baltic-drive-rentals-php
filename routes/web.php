<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;

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
Route::put('/profile/{user}/edit', [UserController::class, 'update']);

//delete 
Route::delete('profile/{user}', [UserController::class, 'destroy'])->middleware('auth')->name('delete');

//terms
//show
Route::get('/terms', [TermController::class, 'index'])->name('terms');

//create
Route::get('/terms/create', [TermController::class, 'create'])->name('terms.create'); 
Route::post('/terms/create', [TermController::class, 'store']);

// GET	/photos	index	photos.index
// GET	/photos/create	create	photos.create
// POST	/photos	store	photos.store
// GET	/photos/{photo}	show	photos.show
// GET	/photos/{photo}/edit	edit	photos.edit
// PUT/PATCH	/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy




// Environmental Impact Tracking
// Reward Programs