@extends('layouts.app')

@section('title', 'Booking List')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Pemesanan</h1>
    <a href="{{ route('booking.create') }}" class="btn btn-primary mb-3">Buat Pemesanan Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kursi</th>
                <th scope="col">Jadwal Tayangan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->seat->seat_number }}</td>
                <td>{{ $booking->showtime->movie->judul }} - {{ $booking->showtime->start_time }}</td>
                <td>{{ $booking->total_price }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $bookings->links() !!}
    </div>
</div>
@endsection
