@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Title Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold" style="font-family: 'Roboto', sans-serif; color: #333;">Edit Kursi yang Ada</h1>
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
        <form action="{{ route('seat.update', $seat) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Showtime Selection -->
            <div class="form-group mb-3">
                <label for="showtime_id" class="font-weight-bold">Jadwal Tayang</label>
                <select name="showtime_id" id="showtime_id" class="form-control form-control-lg border-primary" required>
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}" {{ $showtime->id == $seat->showtime_id ? 'selected' : '' }}>
                            {{ $showtime->movie->judul }} - {{ $showtime->screen }} ({{ $showtime->start_time }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Seat Number -->
            <div class="form-group mb-3">
                <label for="seat_number" class="font-weight-bold">Nomor Kursi</label>
                <input type="text" name="seat_number" class="form-control form-control-lg border-primary" id="seat_number" value="{{ old('seat_number', $seat->seat_number) }}" required>
            </div>

            <!-- Seat Status -->
            <div class="form-group mb-3">
                <label for="status" class="font-weight-bold">Status Kursi</label>
                <select name="status" id="status" class="form-control form-control-lg border-primary" required>
                    <option value="Available" {{ $seat->status == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Booked" {{ $seat->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success btn-lg" style="width: 200px;">Simpan Perubahan</button>
                <a href="{{ route('seat.index') }}" class="btn btn-secondary btn-lg" style="width: 200px;">Kembali</a>
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
