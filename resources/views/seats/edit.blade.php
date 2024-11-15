@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Edit Kursi yang Ada</h1>
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

        <form action="{{ route('seat.update', $seat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="showtime_id">Jadwal Tayang</label>
                <select name="showtime_id" id="showtime_id" class="form-control" required>
                    @foreach ($showtimes as $showtime)
                        <option value="{{ $showtime->id }}" {{ $showtime->id == $seat->showtime_id ? 'selected' : '' }}>
                            {{ $showtime->movie->judul }} - {{ $showtime->screen }} ({{ $showtime->start_time }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seat_number">Nomor Kursi</label>
                <input type="text" name="seat_number" class="form-control" id="seat_number" value="{{ old('seat_number', $seat->seat_number) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status Kursi</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Available" {{ $seat->status == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Booked" {{ $seat->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
