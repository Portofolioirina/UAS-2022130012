<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {
        $bioskops = Bioskop::paginate(10);
        return view('bioskops.index', compact('bioskops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bioskops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
        ]);

           Bioskop::create([
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'kota' => $validated['kota'],
            'jenis' => $validated['jenis'],
           ]);

           return redirect()->route('bioskop.index')->with('success', 'Bioskop added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bioskop $bioskop)
    {
        return view('bioskops.show', compact('bioskop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bioskop $bioskop)
    {
        return view('bioskops.edit', compact('bioskop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bioskop $bioskop)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
        ]);


           $bioskop->update([
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'kota' => $validated['kota'],
            'jenis' => $validated['jenis'],
           ]);

           return redirect()->route('bioskop.index')->with('success', 'bioskop update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bioskop $bioskop)
    {
        $bioskop->delete();
        return redirect()->route('bioskop.index')->with('success', 'bioskop deleted successfully!');
    }
}
