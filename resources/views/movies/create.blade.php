@extends('layouts.app')

@section('title', 'Create Movie')

@section('content')
<div class="container mt-4">
    <h1>Create Movie</h1>

    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" class="form-control" id="genre" required>
        </div>

        <div class="form-group">
            <label for="durasi">Durasi (menit)</label>
            <input type="number" name="durasi" class="form-control" id="durasi" required>
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" name="rating" class="form-control" id="rating" required>
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control" id="poster"  name="poster" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
