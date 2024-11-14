@extends('layouts.app')

@section('title', 'Movie List')
@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Movie</h1>

    <a href="{{ route('movie.create') }}" class="btn btn-primary btn-sm">Create New Movie</a>
</div>

@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Genre</th>
                <th scope="col">Durasi</th>
                <th scope="col">Rating</th>
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
                <td>{{ $movie->durasi }}</td>
                <td>{{ $movie->rating }}</td>
                <td>{{ $movie->created_at }}</td>
                <td>{{ $movie->updated_at }}</td>
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
                <td colspan="7">No movie found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $movies->links() !!}
    </div>
</div>
@endsection
