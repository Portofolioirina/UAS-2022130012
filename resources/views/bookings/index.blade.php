@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pemesanan</h1>
    <a href="{{ route('booking.create') }}" class="btn btn-primary">Buat Pemesanan Baru</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kursi</th>
                <th>Jadwal Tayangan</th>
                <th>Total Harga</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->seat->seat_number }}</td>
                    <td>{{ $booking->showtime->movie->title }} - {{ $booking->showtime->start_time }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection
