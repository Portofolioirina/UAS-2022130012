@extends('layouts.app')

@section('title', "Bioskop: $bioskop->nama")

@section('content')
<div class="container mt-5">
    <!-- Bioskop Details -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">{{ $bioskop->nama }}</h1>
    </div>

    <!-- Bioskop Details Table -->
    <div class="card shadow-sm p-4">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="row" class="font-weight-bold">Nama</th>
                    <td>{{ $bioskop->nama }}</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Alamat</th>
                    <td>{{ $bioskop->alamat }}</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Kota</th>
                    <td>{{ $bioskop->kota }}</td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-bold">Jenis</th>
                    <td>{{ $bioskop->jenis }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
    <style>
        /* Styling the card */
        .card {
            border-radius: 12px;
            background-color: #f9f9f9;
        }

        /* Styling the table */
        .table {
            background-color: #ffffff;
            border-collapse: collapse;
            border-radius: 8px;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Shadow effect for card */
        .shadow-sm {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Centering the content */
        .text-center {
            text-align: center;
        }

        /* Adjusting spacing and margins */
        .container {
            max-width: 800px;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
