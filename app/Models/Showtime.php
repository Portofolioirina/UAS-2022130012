<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $fillable = [
        'bioskop_id',
        'movie_id',
        'screen',
        'start_time',
        'end_time',
    ];

    public function bioskop()
    {
        return $this->belongsTo(Bioskop::class);  // Relasi many-to-one
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function seat(){
        return $this->hasMany(Seat::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
