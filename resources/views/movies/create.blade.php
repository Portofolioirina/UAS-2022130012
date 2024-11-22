@extends('layouts.app')

@section('title', 'Create Movie')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Create New Movie</h1>

    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="judul" class="font-weight-bold">Judul</label>
            <input type="text" name="judul" class="form-control form-control-lg border-primary" id="judul" required placeholder="Masukkan judul film">
        </div>

        <div class="form-group mb-3">
            <label for="genre" class="font-weight-bold">Genre</label>
            <input type="text" name="genre" class="form-control form-control-lg border-primary" id="genre" required placeholder="Masukkan genre film">
        </div>

        <div class="form-group mb-3">
            <label for="durasi" class="font-weight-bold">Durasi (menit)</label>
            <input type="number" name="durasi" class="form-control form-control-lg border-primary" id="durasi" required placeholder="Masukkan durasi film dalam menit">
        </div>

        <div class="form-group mb-3">
            <label for="rating" class="font-weight-bold">Rating</label>
            <input type="text" name="rating" class="form-control form-control-lg border-primary" id="rating" required placeholder="Masukkan rating film">
        </div>

        <div class="form-group mb-3">
            <label for="poster" class="font-weight-bold">Poster</label>
            <input type="file" class="form-control form-control-lg border-primary" id="poster" name="poster" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Save Movie</button>
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
