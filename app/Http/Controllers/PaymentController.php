<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('create','show');
    }

    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookings = Booking::all();
        return view('payments.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|string|max:50',
        ]);

        Payment::create($validated);
        return redirect()->route('payment.index')->with('success', 'Payment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        if (!$payment) {
            // Jika pembayaran tidak ditemukan, redirect atau beri pesan error
            return redirect()->route('home')->with('error', 'Payment not found.');
        }
        $booking = $payment->booking;
        return view('payments.show', compact('booking', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
