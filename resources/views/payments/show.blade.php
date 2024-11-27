@extends('layouts.app')

@section('title', "Payment: $payment->id")

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Payment for Booking #{{ $booking->id }}</h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Showtime Details</h4>
            <p><strong>Movie:</strong> {{ $booking->showtime->movie->judul }}</p>
            <p><strong>Screen:</strong> {{ $booking->showtime->screen }}</p>
            <p><strong>Time:</strong> {{ $booking->showtime->start_time }}</p>

            <h4>Seat Details</h4>
            <p><strong>Seat Number:</strong> {{ $booking->seat->seat_number }}</p>
            <p><strong>Status:</strong> {{ $booking->seat->status }}</p>

            <h4>Total Price: {{ $booking->total_price }}</h4>
            <h4>Booking Date: {{ $booking->booking_date }}</h4>

        </div>
    </div>
</div>
@endsection
