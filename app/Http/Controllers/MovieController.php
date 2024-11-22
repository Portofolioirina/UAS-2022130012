<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all(); // Ambil semua film
        return view('movies.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'durasi' => 'required|integer|max:9999',
            'rating' => 'required|numeric|between:0,10',
            'trailer_url' => 'nullable|url|regex:/^(https:\/\/(www\.)?youtube\.com\/.*)$/', // Validasi URL YouTube
        ]);

        // Proses penyimpanan poster jika ada
        if ($request->hasFile('poster')) {
            $request->validate([
                'poster' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('poster')->store('public');
            $validated['poster'] = $imagePath;
        }

        // Penyimpanan data film ke database
        Movie::create([
            'judul' => $validated['judul'],
            'genre' => $validated['genre'],
            'durasi' => $validated['durasi'],
            'rating' => $validated['rating'],
            'trailer_url' => $validated['trailer_url'] ?? null,
            'poster' => $validated['poster'] ?? null,
        ]);

        return redirect()->route('movie.index')->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'genre' => 'required|string|max:100',
        'durasi' => 'required|integer|max:9999',
        'rating' => 'required|numeric|between:0,10',
        'trailer_url' => 'nullable|url|regex:/^(https:\/\/(www\.)?youtube\.com\/.*)$/', // Validasi URL YouTube
    ]);

    // Proses penyimpanan poster jika ada
    if ($request->hasFile('poster')) {
        $request->validate([
            'poster' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('poster')->store('public');

        // Hapus gambar lama jika ada
        if ($movie->poster) {
            Storage::delete($movie->poster);
        }

        $validated['poster'] = $imagePath;
    }

    // Update data film di database
    $movie->update([
        'judul' => $validated['judul'],
        'genre' => $validated['genre'],
        'durasi' => $validated['durasi'],
        'rating' => $validated['rating'],
        'trailer_url' => $validated['trailer_url'] ?? null,
        'poster' => $validated['poster'] ?? null,
    ]);

    return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->poster){
            Storage::delete($movie->poster);
        }
        $movie->delete();
        return redirect()->route('movie.index')->with('success', 'movie deleted successfully!');
    }
}
