@extends('layouts.app')

@section('title', "Movie: $movie->judul")

@section('content')
<div class="container mt-5">
    <!-- Movie Poster -->
    <div class="text-center mb-4">
        @if ($movie->poster)
            <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/200' }}" class="img-fluid rounded shadow" alt="Movie Poster"/>
        @else
            <img src="https://placehold.co/200" class="img-fluid rounded shadow" alt="Placeholder Image"/>
        @endif
    </div>

    <!-- Movie Details Table -->
    <div class="card shadow-sm p-4">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="row" class="font-weight-bold">Judul</th>
                    <td>{{ $movie->judul }}</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Genre</th>
                    <td>{{ $movie->genre }}</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Durasi</th>
                    <td>{{ $movie->durasi }} menit</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Rating</th>
                    <td>{{ $movie->rating }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
    <style>
        /* Styling for the movie poster */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Styling the card */
        .card {
            border-radius: 12px;
            background-color: #f9f9f9;
        }

        /* Styling the table */
        .table {
            background-color: #ffffff;
            border-collapse: collapse;
            border-radius: 8px;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Shadow effect for images and table */
        .shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Centering content */
        .text-center {
            text-align: center;
        }

        /* Adjusting spacing and margins */
        .container {
            max-width: 800px;
        }

        /* Adding custom margins */
        .mb-4 {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
