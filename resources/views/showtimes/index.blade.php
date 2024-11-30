@extends('layouts.app')

@section('title', 'Showtime List')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Showtime</h1>
    <a href="{{ route('showtime.create') }}" class="btn btn-primary mb-3">Create New Showtime</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">Bioskop</th>
                <th scope="col">Film</th>
                <th scope="col">Layar</th>
                <th scope="col">Mulai</th>
                <th scope="col">Selesai</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($showtimes as $showtime)
            <tr>
                <td>{{ $showtime->bioskop->nama }}</td>
                <td>{{ $showtime->movie->judul }}</td>
                <td>{{ $showtime->screen }}</td>
                <td>{{ $showtime->start_time }}</td>
                <td>{{ $showtime->end_time }}</td>
                <td>{{ $showtime->created_at->format('d M Y H:i') }}</td>
                <td>{{ $showtime->updated_at->format('d M Y H:i') }}</td>
                <td>
                    <a href="{{ route('showtime.edit', $showtime) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('showtime.destroy', $showtime) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No showtimes found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $showtimes->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
