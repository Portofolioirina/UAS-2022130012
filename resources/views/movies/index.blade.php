@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Film</h1>
    <a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">Create New Movie</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Genre</th>
                <th scope="col">Durasi</th>
                <th scope="col">Rating</th>
                <th scope="col">Trailer</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <th scope="row">{{ $movie->id }}</th>
                    <td>
                        <a href="{{ route('movie.show', $movie) }}">
                            {{ $movie->judul }}
                        </a>
                    </td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->durasi }} menit</td>
                    <td>{{ $movie->rating }}</td>
                    <td>
                        @if($movie->trailer_url)
                            <a href="{{ $movie->trailer_url }}" target="_blank" class="btn btn-secondary">Tonton Trailer</a>
                        @else
                            <span>Tidak Tersedia</span>
                        @endif
                    </td>
                    <td>{{ $movie->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $movie->updated_at->format('d M Y H:i') }}</td>
                    <td>
                        <a href="{{ route('movie.edit', $movie) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('movie.destroy', $movie) }}" method="POST" class="d-inline-block">
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
                    <td colspan="8" class="text-center">No movies found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $movies->links() !!}
    </div>
</div>
@endsection
