@extends('layouts.app')

@section('content')
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach($movies as $key => $movie)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/800x400' }}" class="d-block w-100" alt="{{ $movie->judul }}"/>
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $movie->judul }}</h5>
                    <p>{{ $movie->genre }} | {{ $movie->durasi }} menit | Rating: {{ $movie->rating }}</p>
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

<div class="container mt-5">
    <h2 class="text-center mb-4">Film yang Sedang Tayang</h2>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-light">
                <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/400x600' }}" class="card-img-top" alt="{{ $movie->judul }}"/>
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->judul }}</h5>
                    <p class="card-text">Genre: {{ $movie->genre }}</p>
                    <p class="card-text">Durasi: {{ $movie->durasi }} menit</p>
                    <p class="card-text">Rating: {{ $movie->rating }}</p>
                    <a href="{{ route('bookings.create', $movie->id) }}" class="btn btn-primary">B</a>
                    <a href="{{ $movie->trailer_url }}" class="btn btn-secondary" target="_blank">Tonton Trailer</a> <!-- Optional trailer button -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Menampilkan pagination -->
    <div class="d-flex justify-content-center">
        {{ $movies->links() }}
    </div>
</div>
@endsection
