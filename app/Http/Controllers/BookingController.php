<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {
        $bookings = Booking::with('showtime', 'seat')->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $showtimes = Showtime::all();
        $seats = Seat::all();
        return view('bookings.create', compact('showtimes', 'seats'));
    }

    public function store(Request $request)
    {
        // Validate data from the form
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'total_price' => 'required|numeric',
            'booking_date' => 'required|date', // Validation for booking_date
        ]);

        // Create the booking record
        $booking = Booking::create([
            'seat_id' => $request->seat_id,
            'showtime_id' => $request->showtime_id,
            'total_price' => $request->total_price,
            'booking_date' => $request->booking_date,
        ]);

        // Update the seat status to 'Booked'
        $seat = Seat::find($request->seat_id);
        $seat->status = 'Booked';
        $seat->save();

        // Redirect to the payment page with success message
        return redirect()->route('payment.create', ['bookingId' => $booking->id])
            ->with('success', 'Booking successful, please proceed with payment.');
    }

    public function payment($bookingId)
    {
        // Show the payment page for the booking
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
        // Validate the data from the form
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'total_price' => 'required|numeric',
            'booking_date' => 'required|date', // Validation for booking_date
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking data
        $booking->update([
            'seat_id' => $request->seat_id,
            'showtime_id' => $request->showtime_id,
            'total_price' => $request->total_price,
            'booking_date' => $request->booking_date,
        ]);

        // Update seat status if the seat has changed
        $seat = Seat::find($request->seat_id);

        if ($seat->id !== $booking->seat_id) {
            // Release the old seat
            $oldSeat = Seat::find($booking->seat_id);
            $oldSeat->status = 'Available';
            $oldSeat->save();

            // Mark the new seat as 'Booked'
            $seat->status = 'Booked';
            $seat->save();
        }

        // Redirect back with success message
        return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        // Release the seat before deleting the booking
        $seat = Seat::find($booking->seat_id);
        $seat->status = 'Available'; // Mark seat as available again
        $seat->save();

        // Delete the booking
        $booking->delete();

        // Redirect with success message
        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }
}
