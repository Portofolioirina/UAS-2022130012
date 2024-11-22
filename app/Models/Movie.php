<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'genre',
        'durasi',
        'rating',
        'trailer_url',
        'poster',
        'is_now_showing',
    ];

    protected $append = [
        'poster_url',
    ];

    public function getPosterAttribute()
    {
        $poster = $this->attributes['poster'] ?? null;

    if (filter_var($poster, FILTER_VALIDATE_URL)) {
        return $poster;
    }

        return $poster ? Storage::url($poster) : null;
    }

    public function showtime(){
        return $this->hasMany(Showtime::class);
    }
}
