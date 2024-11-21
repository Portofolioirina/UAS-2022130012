@extends('layouts.app')

@section('title', "Movie: $movie->judul")

@section('content')
<div class="container mt-5">
    @if ($movie->poster)
    <img src="{{ $movie->poster ? Storage::url(ltrim($movie->poster, 'storage/')) : 'https://placehold.co/200' }}"/>
    @endif
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Judul</th>
                <td>{{ $movie->judul }}</td>
            </tr>
            <tr>
                <th scope="row">Genre</th>
                <td>{{ $movie->genre }}</td>
            </tr>
            <tr>
                <th scope="row">Durasi</th>
                <td>{{ $movie->durasi }}</td>
            </tr>
            <tr>
                <th scope="row">Rating</th>
                <td>{{ $movie->rating }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

