@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Seat</h1>
    <form action="{{ route('seat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="showtime_id">Showtimes</label>
            <select name="showtime_id" id="showtime_id" class="form-control" required>
                <option value="" disabled selected>Pilih Showtime</option> <!-- Placeholder option -->

                @if($showtimes->isEmpty())
                    <option value="" disabled>Tidak ada showtime tersedia</option>
                @else
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}">
                            {{ $showtime->movie->judul }} - {{ $showtime->screen }} {{ $showtime->start_time }}
                        </option>
                    @endforeach
                @endif
            </select>

            @if ($errors->has('showtime_id'))
                <span class="text-danger">{{ $errors->first('showtime_id') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="seat_number">Nomor kursi</label>
            <input type="text" name="seat_number" id="seat_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status Kursi</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Available" selected>Available</option>
                <option value="Booked">Booked</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
