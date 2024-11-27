@extends('layouts.app')

@section('title', 'Create Payment')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Create New Payment</h1>

    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="booking_id" class="font-weight-bold">Booking ID</label>
            <select type="text" name="booking_id" class="form-control form-control-lg border-primary" id="booking_id" required placeholder="Masukkan ID booking">
                @foreach ($bookings as $booking)
                <option value="{{ $booking->id }}"> {{ $booking->showtime_id }} - {{ $booking->seat_id}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="payment_date">Payment Date</label>
            <input type="date" name="payment_date" class="form-control form-control-lg border-primary" id="payment_date" required>
        </div>

        <div class="form-group mb-3">
            <label for="amount" class="font-weight-bold">Total bayar</label>
            <input type="number" name="amount" class="form-control form-control-lg border-primary" id="amount" required placeholder="Masukkan jumlah pembayaran">
        </div>

        <div class="form-group mb-3">
            <label for="payment_method" class="font-weight-bold">Payment Method</label>
            <select name="payment_method" class="form-control form-control-lg border-primary" id="payment_method" required>
                <option value="">Pilih metode pembayaran</option>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" class="form-control form-control-lg border-primary" id="payment_status" required>
                <option value="">Select a payment status</option>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Save Payment</button>
        </div>
    </form>
</div>

@endsection

@section('styles')
    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(135deg, #f7a7b2, #c7a2ff);
        }

        /* Styling the form */
        .form-group label {
            font-size: 1.1rem;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(52, 58, 64, 0.7);
            border-color: #5c6bc0;
        }

        /* Hover effect for submit button */
        .btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Centering the header */
        h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 2.5rem;
            color: #3c3c3c;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Adding margin on button */
        .btn {
            margin-top: 20px;
        }

        /* Styling for error messages if any */
        .text-danger {
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
@endsection
