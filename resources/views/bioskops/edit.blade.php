@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Update Existing Bioskop</h1>
</div>
<div class="row my-5">
    <div class="col-12 px-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('bioskop.update', $bioskop) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="nama">Nama Bioskop</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama' , $bioskop->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat' , $bioskop->alamat) }}" required>
        </div>

        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" class="form-control" id="kota" value="{{ old('kota', $bioskop->kota) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="tex" name="jenis"  class="form-control" id="jenis" value="{{ old('jenis', $bioskop->jenis) }}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
</div>
@endsection
