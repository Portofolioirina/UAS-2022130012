@extends('layouts.app')

@section('title', 'Booking Tiket Movie')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Booking Tiket Movie</h1>

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="showtime_id" class="font-weight-bold">Showtime</label>
            <select name="showtime_id" id="showtime_id" class="form-control form-control-lg border-primary" required>
                <option value="" disabled selected>Pilih Showtime</option>
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">
                        {{ $showtime->movie->judul }} - {{ $showtime->screen }}
                        ({{ $showtime->start_time }})
                    </option>
                @endforeach
            </select>
            @if ($errors->has('showtime_id'))
                <span class="text-danger">{{ $errors->first('showtime_id') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="seat_id" class="font-weight-bold">Seat</label>
            <select name="seat_id" id="seat_id" class="form-control form-control-lg border-primary" required>
                <option value="" disabled selected>Pilih Seat</option>
                @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">
                        Seat {{ $seat->seat_number }} ({{ $seat->status }})
                    </option>
                @endforeach
            </select>
            @if ($errors->has('seat_id'))
                <span class="text-danger">{{ $errors->first('seat_id') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="total_price" class="font-weight-bold">Total Price</label>
            <input type="text" name="total_price" id="total_price" class="form-control form-control-lg border-primary" value="50000" readonly required>
            @if ($errors->has('total_price'))
                <span class="text-danger">{{ $errors->first('total_price') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="booking_date" class="font-weight-bold">Booking Date</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control form-control-lg border-primary" required>
            @if ($errors->has('booking_date'))
                <span class="text-danger">{{ $errors->first('booking_date') }}</span>
            @endif
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Book Ticket</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
    <style>
        body {
            background: linear-gradient(135deg, #f7a7b2, #c7a2ff);
        }

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

        .btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

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

        .btn {
            margin-top: 20px;
        }

        .text-danger {
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
@endsection
