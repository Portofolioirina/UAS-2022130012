@extends('layouts.app')

@section('title', "Bioskop: $bioskop->nama")

@section('content')
<div class="container mt-5">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>{{ $bioskop->nama }}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>{{ $bioskop->alamat }}</td>
            </tr>
            <tr>
                <th scope="row">Kota</th>
                <td>{{ $bioskop->kota }}</td>
            </tr>
            <tr>
                <th scope="row">Jenis</th>
                <td>{{ $bioskop->jenis }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

