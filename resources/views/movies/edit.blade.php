@extends('layouts.app')

@section('title', 'Update Movie')

@section('content')
<div class="container mt-5">
    <!-- Title Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold" style="font-family: 'Roboto', sans-serif; color: #333;">Update Movie</h1>
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
        <form action="{{ route('movie.update', $movie) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <!-- Title -->
            <div class="form-group mb-3">
                <label for="judul" class="font-weight-bold">Judul</label>
                <input type="text" name="judul" class="form-control form-control-lg border-primary" id="judul" value="{{ old('judul', $movie->judul) }}" required placeholder="Masukkan judul film">
            </div>

            <!-- Genre -->
            <div class="form-group mb-3">
                <label for="genre" class="font-weight-bold">Genre</label>
                <input type="text" name="genre" class="form-control form-control-lg border-primary" id="genre" value="{{ old('genre', $movie->genre) }}" required placeholder="Masukkan genre film">
            </div>

            <!-- Duration -->
            <div class="form-group mb-3">
                <label for="durasi" class="font-weight-bold">Durasi (menit)</label>
                <input type="number" name="durasi" class="form-control form-control-lg border-primary" id="durasi" value="{{ old('durasi', $movie->durasi) }}" required placeholder="Masukkan durasi film dalam menit">
            </div>

            <!-- Rating -->
            <div class="form-group mb-3">
                <label for="rating" class="font-weight-bold">Rating</label>
                <input type="number" name="rating" step=".1" class="form-control form-control-lg border-primary" id="rating" value="{{ old('rating', $movie->rating) }}" required placeholder="Masukkan rating film">
            </div>

            <div class="form-group mb-3">
                <label for="trailer_url" class="form-label">Link Trailer</label>
                <input type="url" name="trailer_url" id="trailer_url" class="form-control form-control-lg border-primary" value="{{ old('trailer_url', $movie->trailer_url) }}" required placeholder="Masukkan link trailer film">
            </div>

            <!-- Poster -->
            <div class="form-group mb-3">
                <label for="poster" class="font-weight-bold">Poster</label>
                <input type="file" class="form-control form-control-lg border-primary" id="poster" name="poster">
                @if ($movie->poster)
                    <img src="{{ $movie->poster_url }}" class="mt-3" style="max-width: 400px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"/>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Save Movie</button>
            </div>
        </form>
    </div>
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

        .alert-danger ul {
            margin: 0;
        }

        /* Styling the card and shadow */
        .card {
            border-radius: 12px;
            background-color: #f9f9f9;
        }
    </style>
@endsection
