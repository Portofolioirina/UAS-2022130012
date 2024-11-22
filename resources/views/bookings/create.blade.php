@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Booking Tiket Movie</h1>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="showtime_id">Showtime</label>
            <select name="showtime_id" id="showtime_id" class="form-control" required>
                <option value="" disabled selected>Pilih Showtime</option>
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">
                        {{ $showtime->movie->judul }} - {{ $showtime->screen }}
                        ({{ $showtime->start_time }})
                    </option>
                @endforeach
            </select>
            @if ($errors->has('showtime_id'))
                <span class="text-danger">{{ $errors->first('showtime_id') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="seat_id">Seat</label>
            <select name="seat_id" id="seat_id" class="form-control" required>
                <option value="" disabled selected>Pilih Seat</option>
                @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">
                        Seat {{ $seat->seat_number }} ({{ $seat->status }})
                    </option>
                @endforeach
            </select>
            @if ($errors->has('seat_id'))
                <span class="text-danger">{{ $errors->first('seat_id') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="text" name="total_price" id="total_price" class="form-control" required>
            @if ($errors->has('total_price'))
                <span class="text-danger">{{ $errors->first('total_price') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" required>
            @if ($errors->has('booking_date'))
                <span class="text-danger">{{ $errors->first('booking_date') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Available" selected>Available</option>
                <option value="Booked">Booked</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Book Ticket</button>
    </form>
</div>
@endsection
