@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Showtime</h1>

    <form action="{{ route('showtime.update', $showtime->showtime_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="movie_id">Film</label>
            <select name="movie_id" id="movie_id" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $movie->id == $showtime->movie_id ? 'selected' : '' }}>
                        {{ $movie->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="screen">Layar</label>
            <input type="text" name="screen" id="screen" class="form-control" value="{{ old('screen', $showtime->screen) }}" required>
        </div>

        <div class="form-group">
            <label for="start_time">Waktu Mulai</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', \Carbon\Carbon::parse($showtime->start_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">Waktu Selesai</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', \Carbon\Carbon::parse($showtime->end_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>
@endsection
