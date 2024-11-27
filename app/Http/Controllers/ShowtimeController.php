<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
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
        $showtimes = Showtime::with('movie')->paginate(10);
        return view('showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bioskops = Bioskop::all();
        $movies = Movie::all();
        return view('showtimes.create', compact('movies', 'bioskops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bioskop_id' => 'required|exists:bioskops,id',
            'movie_id' => 'required|exists:movies,id',
            'screen' => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Showtime::create($validated);
        return redirect()->route('showtime.index')->with('success', 'Showtimes added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        return view('showtimes.show', compact('showtime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        $bioskops = Bioskop::all();
        $movies = Movie::all();
        return view('showtimes.edit', compact('showtime', 'movies', 'bioskops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showtime $showtime)
    {
        $validated = $request->validate([
            'bioskop_id' => 'required|exists:bioskops,id',
            'movie_id' => 'required|exists:movies,id',
            'screen' => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $showtime->update($validated);
        return redirect()->route('showtime.index')->with('success', 'Showtimes update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtime.index')->with('success', 'showtime deleted successfully!');
    }
}
