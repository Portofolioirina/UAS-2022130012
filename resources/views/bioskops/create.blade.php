@extends('layouts.app')

@section('title', 'Create Bioskop')

@section('content')
<div class="container mt-4">
    <h1>Create Bioskop</h1>

    <form action="{{ route('bioskop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Bioskop</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" required>
        </div>

        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" class="form-control" id="kota" required>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" name="jenis" class="form-control" id="jenis" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
