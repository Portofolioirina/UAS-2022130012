<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'jenis',
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
