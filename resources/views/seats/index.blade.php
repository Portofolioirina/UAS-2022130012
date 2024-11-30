@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Kursi</h1>
    <a href="{{ route('seat.create') }}" class="btn btn-primary mb-3">Tambah Kursi Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Jadwal Tayang</th>
                <th scope="col">Nomor Kursi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seats as $seat)
                <tr>
                    <td>{{ $seat->showtime->movie->judul }} - {{ $seat->showtime->screen }} ({{ $seat->showtime->start_time }})</td>
                    <td>{{ $seat->seat_number }}</td>
                    <td>{{ $seat->status }}</td>
                    <td>
                        <a href="{{ route('seat.edit', $seat) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('seat.destroy', $seat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kursi ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $seats->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
