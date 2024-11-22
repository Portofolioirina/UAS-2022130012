@extends('layouts.app')

@section('title', 'Update Bioskop')

@section('content')
<div class="container mt-5">
    <!-- Title Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold" style="font-family: 'Roboto', sans-serif; color: #333;">Update Bioskop</h1>
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
        <form action="{{ route('bioskop.update', $bioskop) }}" method="POST">
            @method('PUT')
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <label for="nama" class="font-weight-bold">Nama Bioskop</label>
                <input type="text" name="nama" class="form-control form-control-lg border-primary" id="nama" value="{{ old('nama', $bioskop->nama) }}" required placeholder="Masukkan nama bioskop">
            </div>

            <!-- Address -->
            <div class="form-group mb-3">
                <label for="alamat" class="font-weight-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control form-control-lg border-primary" id="alamat" value="{{ old('alamat', $bioskop->alamat) }}" required placeholder="Masukkan alamat bioskop">
            </div>

            <!-- City -->
            <div class="form-group mb-3">
                <label for="kota" class="font-weight-bold">Kota</label>
                <input type="text" name="kota" class="form-control form-control-lg border-primary" id="kota" value="{{ old('kota', $bioskop->kota) }}" required placeholder="Masukkan kota bioskop">
            </div>

            <!-- Type -->
            <div class="form-group mb-3">
                <label for="jenis" class="font-weight-bold">Jenis</label>
                <input type="text" name="jenis" class="form-control form-control-lg border-primary" id="jenis" value="{{ old('jenis', $bioskop->jenis) }}" required placeholder="Masukkan jenis bioskop">
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg" style="width: 200px; font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Save Bioskop</button>
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
