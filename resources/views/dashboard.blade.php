@extends('layouts.app')

@section('content')
<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach($movies as $key => $movie)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/800x400' }}" class="d-block w-100" alt="{{ $movie->judul }}" style="object-fit: cover; height: 500px;" />
                <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
                    <h5 class="text-shadow" style="font-size: 2rem; font-weight: bold;">{{ $movie->judul }}</h5>
                    <p class="text-shadow" style="font-size: 1.1rem; text-transform: uppercase;">{{ $movie->genre }} | {{ $movie->durasi }} menit | Rating: {{ $movie->rating }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Film yang Sedang Tayang -->
<div class="container mt-5">
    <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; font-weight: 600; color: #1f1a85; font-size: 2.5rem;">Film yang Sedang Tayang</h2>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded" style="transition: transform 0.3s ease-in-out; cursor: pointer;">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/400x600' }}" class="card-img-top" alt="{{ $movie->judul }}" style="transition: transform 0.3s ease; border-radius: 10px; object-fit: cover; height: 400px;" />
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 1.2rem; font-weight: 500; color: #1f1a85;">{{ $movie->judul }}</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Genre: {{ $movie->genre }}</p>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Durasi: {{ $movie->durasi }} menit</p>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rating: {{ $movie->rating }}</p>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary w-100 mb-2" style="font-weight: bold; background-color: #007bff; border-color: #007bff; transition: all 0.3s ease-in-out;">Lihat Detail</a>
                    <a href="{{ route('bookings.create', ['movie_id' => $movie->id]) }}" class="btn btn-success w-100 mb-2" style="font-weight: bold; background-color: #28a745; border-color: #28a745; transition: all 0.3s ease-in-out;">Beli Tiket</a>
                    <a href="{{ $movie->trailer_url }}" class="btn btn-secondary w-100" target="_blank" style="font-weight: bold; transition: all 0.3s ease-in-out;">Tonton Trailer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

@section('styles')
    <style>
        /* Styling the carousel image size */
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }

        /* Hover effect on cards */
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Hover effect on images */
        .card-img-top:hover {
            transform: scale(1.1);
        }

        /* Adding text-shadow */
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /* Button hover effects */
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Increase font size for the page heading */
        h2 {
            font-size: 2.5rem;
            color: #1f1a85;
            font-weight: 600;
        }

        /* Enhance the carousel captions */
        .carousel-caption h5 {
            font-size: 2rem;
            font-weight: bold;
        }

        /* Add some padding to the body of the card */
        .card-body {
            padding: 20px;
        }
    </style>
@endsection
