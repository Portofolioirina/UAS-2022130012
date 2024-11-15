@extends('layouts.app')

@section('content')
    <h1>Detail Pembayaran</h1>

    <p>ID Pembayaran: {{ $payment->id }}</p>
    <p>Tanggal Pembayaran: {{ $payment->payment_date }}</p>
    <p>Jumlah: {{ $payment->amount }}</p>
    <p>Metode Pembayaran: {{ $payment->payment_method }}</p>
    <p>Status Pembayaran: {{ $payment->payment_status }}</p>

    <a href="{{ route('bookings.index') }}">Kembali ke Daftar Booking</a>
@endsection
