<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'screen',
        'start_time',
        'end_time',
    ];

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
