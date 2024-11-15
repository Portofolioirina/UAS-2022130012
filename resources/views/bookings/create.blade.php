@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Pemesanan Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="seat_id">Pilih Kursi</label>
            <select name="seat_id" id="seat_id" class="form-control" required>
                <option value="">-- Pilih Kursi --</option>
                @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->seat_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="showtime_id">Pilih Jadwal Tayangan</label>
            <select name="showtime_id" id="showtime_id" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">{{ $showtime->movie->title }} - {{ $showtime->start_time }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_price">Harga</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="50000" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="Confirmed">Confirmed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="booking_date">Tanggal Pemesanan</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Pemesanan</button>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
