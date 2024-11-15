<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Showtime;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {
        $bookings = Booking::with('showtime','seat')->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $showtimes = Showtime::all();
        $seats = Seat::all();
        return view('bookings.create', compact('showtimes','seats'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'booking_date' => 'required|date', // Validasi untuk booking_date
        ]);

        Booking::create($validated);

        // Buat pemesanan baru
        $booking = new Booking();
        $booking->seat_id = $request->seat_id;
        $booking->showtime_id = $request->showtime_id;
        $booking->total_price = $request->total_price;
        $booking->booking_date = $request->booking_date; // Menggunakan booking_date dari input
        $booking->status = $request->status;
        $booking->save();

        // Update status kursi menjadi 'Booked'
        $seat = Seat::find($request->seat_id);
        $seat->status = 'Booked';
        $seat->save();

        return redirect()->route('payment', ['bookingId' => $booking->id]);
    }

    public function payment($bookingId)
    {
        // Logika untuk menampilkan halaman pembayaran
        $booking = Booking::findOrFail($bookingId);
        return view('payments.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $seats = Seat::all();
        $showtimes = Showtime::all();
        return view('bookings.edit', compact('booking', 'seats', 'showtimes'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'booking_date' => 'required|date', // Validasi untuk booking_date
        ]);

        Booking::create($validated);

        // Temukan pemesanan berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Update data pemesanan
        $booking->seat_id = $request->seat_id;
        $booking->showtime_id = $request->showtime_id;
        $booking->total_price = $request->total_price;
        $booking->booking_date = $request->booking_date;
        $booking->status = $request->status;
        $booking->save();

        // Update status kursi jika kursi yang dipilih berbeda
        $seat = Seat::find($request->seat_id);
        if ($seat->id !== $booking->seat_id) {
            // Jika kursi yang dipilih berbeda, update status kursi lama
            $oldSeat = Seat::find($booking->seat_id);
            $oldSeat->status = 'Available'; // Atau status yang sesuai
            $oldSeat->save();

            // Update status kursi baru
            $seat->status = 'Booked';
            $seat->save();
        }

        // Redirect atau kembalikan response
        return redirect()->route('booking.index')->with('success', 'Booking berhasil diperbarui!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }

}
