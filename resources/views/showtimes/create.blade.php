@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Showtime Baru</h1>
    <form action="{{ route('showtime.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="movie_id">Film</label>
            <select name="movie_id" id="movie_id" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="screen">Layar</label>
            <input type="text" name="screen" id="screen" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="start_time">Waktu Mulai</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_time">Waktu Selesai</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
