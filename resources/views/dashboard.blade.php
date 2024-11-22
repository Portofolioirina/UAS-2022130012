@extends('layouts.app')

@section('content')
<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach($movies as $key => $movie)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/800x400' }}" class="d-block w-100" alt="{{ $movie->judul }}" />
                <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.5); padding: 15px; border-radius: 10px;">
                    <h5 class="text-shadow">{{ $movie->judul }}</h5>
                    <p class="text-shadow">{{ $movie->genre }} | {{ $movie->durasi }} menit | Rating: {{ $movie->rating }}</p>
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
    <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; font-weight: 600; color: #333;">Film yang Sedang Tayang</h2>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded" style="transition: transform 0.2s; cursor: pointer;">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/400x600' }}" class="card-img-top" alt="{{ $movie->judul }}" style="transition: transform 0.3s ease; border-radius: 10px; object-fit: cover; height: 400px;" />
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 1.2rem; font-weight: 500;">{{ $movie->judul }}</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Genre: {{ $movie->genre }}</p>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Durasi: {{ $movie->durasi }} menit</p>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rating: {{ $movie->rating }}</p>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary w-100 mb-2" style="font-weight: bold; background-color: #007bff; border-color: #007bff;">Lihat Detail</a>
                    <a href="{{ $movie->trailer_url }}" class="btn btn-secondary w-100" target="_blank" style="font-weight: bold;">Tonton Trailer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links() }}
    </div>
</div>

@endsection

@section('styles')
    <style>
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top:hover {
            transform: scale(1.1);
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection
