@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->booking_id }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->payment_status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
