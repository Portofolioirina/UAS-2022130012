<?php

use App\Http\Controllers\BioskopController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
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


// Halaman Dashboard/Home
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

// Auth Routes
Auth::routes();

// Rute untuk Menampilkan Film yang Sedang Tayang
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// Menampilkan Detail Film
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

// Rute Resource untuk Film
Route::resource('movie', MovieController::class);

// Rute Resource untuk Bioskop
Route::resource('bioskop', BioskopController::class);

// Rute Resource untuk Showtime
Route::resource('showtime', ShowtimeController::class);

// Rute Resource untuk Seat
Route::resource('seat', SeatController::class);

// Rute Resource untuk Booking
Route::resource('booking', BookingController::class);

// Rute Resource untuk Payment
Route::resource('payment', PaymentController::class);

// Rute untuk Pembayaran Terkait Booking
Route::get('payment/{bookingId}', [BookingController::class, 'payment'])->name('payment.show');

// Rute untuk Membuat Booking (Berdasarkan Film)
Route::get('bookings/create/{movie_id}', [BookingController::class, 'create'])->name('bookings.create');

// Rute untuk Menampilkan Daftar Pembayaran
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

// Rute untuk Menyimpan Booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/show-payment', [PaymentController::class, 'show'])->name('show.payment');

