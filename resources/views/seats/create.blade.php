@extends('layouts.app')

@section('title', 'Create New Seat')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Create New Seat</h1>

    <form action="{{ route('seat.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="showtime_id" class="font-weight-bold">Showtimes</label>
            <select name="showtime_id" id="showtime_id" class="form-control form-control-lg border-primary" required>
                <option value="" disabled selected>Pilih Showtime</option> <!-- Placeholder option -->

                @if($showtimes->isEmpty())
                    <option value="" disabled>Tidak ada showtime tersedia</option>
                @else
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}">
                            {{ $showtime->movie->judul }} - {{ $showtime->screen }} {{ $showtime->start_time }}
                        </option>
                    @endforeach
                @endif
            </select>

            @if ($errors->has('showtime_id'))
                <span class="text-danger">{{ $errors->first('showtime_id') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="seat_number" class="font-weight-bold">Nomor Kursi</label>
            <input type="text" name="seat_number" id="seat_number" class="form-control form-control-lg border-primary" required>
            @if ($errors->has('seat_number'))
                <span class="text-danger">{{ $errors->first('seat_number') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="status" class="font-weight-bold">Status Kursi</label>
            <select name="status" id="status" class="form-control form-control-lg border-primary" required>
                <option value="Available" selected>Available</option>
                <option value="Booked">Booked</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Submit</button>
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
