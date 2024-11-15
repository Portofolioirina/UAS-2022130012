@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pemesanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT -->

        <div class="form-group">
            <label for="seat_id">Pilih Kursi</label>
            <select name="seat_id" id="seat_id" class="form-control" required>
                <option value="">-- Pilih Kursi --</option>
                @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}" {{ $seat->id == $booking->seat_id ? 'selected' : '' }}>
                        {{ $seat->seat_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="showtime_id">Pilih Jadwal Tayangan</label>
            <select name="showtime_id" id="showtime_id" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}" {{ $showtime->id == $booking->showtime_id ? 'selected' : '' }}>
                        {{ $showtime->movie->title }} - {{ $showtime->start_time }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $booking->total_price }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="booking_date">Tanggal Pemesanan</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" value="{{ $booking->booking_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Pemesanan</button>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
