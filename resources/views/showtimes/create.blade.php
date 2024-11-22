@extends('layouts.app')

@section('title', 'Create Showtime')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Create New Showtime</h1>

    <form action="{{ route('showtime.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="bioskop_id" class="font-weight-bold">Bioskop</label>
            <select name="bioskop_id" id="bioskop_id" class="form-control form-control-lg border-primary" required>
                @foreach ($bioskops as $bioskop)
                    <option value="{{ $bioskop->id }}">{{ $bioskop->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="movie_id" class="font-weight-bold">Film</label>
            <select name="movie_id" id="movie_id" class="form-control form-control-lg border-primary" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="screen" class="font-weight-bold">Layar</label>
            <input type="text" name="screen" id="screen" class="form-control form-control-lg border-primary" required placeholder="Masukkan nomor layar">
        </div>

        <div class="form-group mb-3">
            <label for="start_time" class="font-weight-bold">Waktu Mulai</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control form-control-lg border-primary" required>
        </div>

        <div class="form-group mb-3">
            <label for="end_time" class="font-weight-bold">Waktu Selesai</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control form-control-lg border-primary" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Save Showtime</button>
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
