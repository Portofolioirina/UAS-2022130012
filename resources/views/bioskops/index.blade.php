@extends('layouts.app')

@section('title', 'Movie List')
@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Bioskop</h1>

    <a href="{{ route('bioskop.create') }}" class="btn btn-primary btn-sm">Create New Bioskop</a>
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
                <th scope="col">Nama Bioskop</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Jenis</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bioskops as $bioskop)
            <tr>
                <th scope="row">{{ $bioskop->id }}</th>
                <td>
                    <a href="{{ route('bioskop.show', $bioskop) }}">
                        {{ $bioskop->nama }}
                    </a>
                </td>
                <td>{{ $bioskop->alamat }}</td>
                <td>{{ $bioskop->kota }}</td>
                <td>{{ $bioskop->jenis }}</td>
                <td>{{ $bioskop->created_at }}</td>
                <td>{{ $bioskop->updated_at }}</td>
                <td>
                    <a href="{{ route('bioskop.edit', $bioskop) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('bioskop.destroy', $bioskop) }}" method="POST" class="d-inline-block">
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
                <td colspan="7">No bioskop found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $bioskops->links() !!}
    </div>
</div>
@endsection
