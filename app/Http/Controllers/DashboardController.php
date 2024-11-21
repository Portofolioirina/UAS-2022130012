<?php

namespace App\Http\Controllers;

use App\Models\Movie; // Make sure to import the Movie model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('dashboard', compact('movies'));
    }
}
