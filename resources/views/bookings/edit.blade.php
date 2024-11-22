@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Title Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold" style="font-family: 'Roboto', sans-serif; color: #333;">Edit Pemesanan</h1>
    </div>

    <!-- Error Handling -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Section -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Seat Selection -->
            <div class="form-group mb-3">
                <label for="seat_id" class="font-weight-bold">Pilih Kursi</label>
                <select name="seat_id" id="seat_id" class="form-control form-control-lg border-primary" required>
                    <option value="">-- Pilih Kursi --</option>
                    @foreach ($seats as $seat)
                        <option value="{{ $seat->id }}" {{ $seat->id == $booking->seat_id ? 'selected' : '' }}>
                            {{ $seat->seat_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Showtime Selection -->
            <div class="form-group mb-3">
                <label for="showtime_id" class="font-weight-bold">Pilih Jadwal Tayangan</label>
                <select name="showtime_id" id="showtime_id" class="form-control form-control-lg border-primary" required>
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}" {{ $showtime->id == $booking->showtime_id ? 'selected' : '' }}>
                            {{ $showtime->movie->title }} - {{ $showtime->start_time }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Total Price -->
            <div class="form-group mb-3">
                <label for="total_price" class="font-weight-bold">Total Harga</label>
                <input type="number" name="total_price" id="total_price" class="form-control form-control-lg border-primary" value="{{ $booking->total_price }}" readonly>
            </div>

            <!-- Booking Date -->
            <div class="form-group mb-3">
                <label for="booking_date" class="font-weight-bold">Tanggal Pemesanan</label>
                <input type="date" name="booking_date" id="booking_date" class="form-control form-control-lg border-primary" value="{{ $booking->booking_date }}" required>
            </div>

            <!-- Submit and Back Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success btn-lg" style="width: 200px;">Update Pemesanan</button>
                <a href="{{ route('booking.index') }}" class="btn btn-secondary btn-lg" style="width: 200px;">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
    <style>
        /* Styling the container and page background */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Styling the heading */
        h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 2rem;
            color: #333;
        }

        /* Form styling */
        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(52, 58, 64, 0.7);
            border-color: #5c6bc0;
        }

        /* Button styling */
        .btn {
            font-size: 1.1rem;
            padding: 12px 20px;
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        /* Error Message Styling */
        .alert-danger ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .alert-danger li {
            font-size: 0.9rem;
        }

        /* Adjusting margins for buttons */
        .d-flex button {
            margin-top: 20px;
        }

        /* Input styling */
        .form-group label {
            font-size: 1.1rem;
            color: #333;
        }
    </style>
@endsection
