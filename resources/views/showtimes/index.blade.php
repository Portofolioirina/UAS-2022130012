@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Showtime</h1>
    <a href="{{ route('showtime.create') }}" class="btn btn-primary mb-3">Create New Showtime</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Bioskop</th>
                <th scope="col">Film</th>
                <th scope="col">Layar</th>
                <th scope="col">Mulai</th>
                <th scope="col">Selesai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showtimes as $showtime)
                <tr>
                    <td>{{ $showtime->bioskop->nama }}</td>
                    <td>{{ $showtime->movie->judul }}</td>
                    <td>{{ $showtime->screen }}</td>
                    <td>{{ $showtime->start_time }}</td>
                    <td>{{ $showtime->end_time }}</td>
                    <td>
                        <a href="{{ route('showtime.edit', $showtime) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a href="{{ route('showtime.destroy', $showtime) }}" class="btn btn-primary btn-sm">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
