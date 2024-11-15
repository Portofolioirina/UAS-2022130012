<?php

use App\Http\Controllers\BioskopController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowtimeController;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Showtime;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/movie', MovieController::class);
Route::resource('/bioskop', BioskopController::class);
Route::resource('showtime', ShowtimeController::class);
Route::resource('seat', SeatController::class);
Route::resource('booking', BookingController::class);
Route::resource('payment', PaymentController::class);


