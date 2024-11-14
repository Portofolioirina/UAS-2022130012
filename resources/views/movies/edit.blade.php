@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Update Existing Movie</h1>
</div>
<div class="row my-5">
    <div class="col-12 px-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('movie.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul' , $movie->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" class="form-control" id="genre" value="{{ old('genre' , $movie->genre) }}" required>
        </div>

        <div class="form-group">
            <label for="durasi">Durasi</label>
            <input type="number" name="durasi" class="form-control" id="durasi" value="{{ old('durasi', $movie->durasi) }}" required>
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating"  Step=".1" class="form-control" id="rating" value="{{ old('rating', $movie->rating) }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Poster</label>
            <input type="file" class="form-control" id="poster"  name="poster">
            @if ($movie->poster)
                <img src={{ $movie->poster_url }} class="mt-3" style="max-width: 400px; "/>

            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
</div>
@endsection
