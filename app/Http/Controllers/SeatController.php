<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seats = Seat::with('showtime')->paginate(10);
        return view('seats.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $showtimes = Showtime::all();
        return view('seats.create', compact('showtimes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        Seat::create($validated);
        return redirect()->route('seat.index')->with('success', 'Seat added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        $showtimes = Showtime::all();
        return view('seats.edit', compact('seat', 'showtimes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seat $seat)
    {
        $validated = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $seat->update($validated);
        return redirect()->route('seat.index')->with('success', 'Seat update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('seat.index')->with('success', 'Seat deleted successfully!');
    }
}
