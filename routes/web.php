<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsereventController;
use Illuminate\Support\Facades\Route;

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

//Auth use

Route::get('/', [UserController::class, 'loginUser'])->middleware('auth');

// Route::post('/', function () {
//     return redirect('login');
// });
// Route::get('/', function () {

//     return view('login');
// });
//Route::match(['get', 'post'], '/login', [UserController::class, 'login']);

Route::view('register', 'register');
Route::get('/', [UserController::class, 'loginn']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/index', [UserController::class, 'index']);
Route::get('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'loginValidate'], function () {
    Route::get('home', [UsereventController::class, 'home']);

    // Define the named route for managing users
    Route::get('/users/manage', [UserController::class, 'manage'])->name('users.manage');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/show/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //Event's Management

    // Define routes for EventController
    Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/show/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/edit/{event}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/update/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/destroy/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    //Booking management
    Route::get('/bookings/manage/', [BookingController::class, 'manage'])->name('bookings.manage');
    Route::get('/bookings/create/{eventId}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store/', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/show/{event}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/edit/{event}', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/update/{event}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/destroy/{event}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
