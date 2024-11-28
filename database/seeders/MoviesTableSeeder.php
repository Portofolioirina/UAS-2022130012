<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'judul' => 'Avengers: Endgame',
                'genre' => 'Action, Adventure, Sci-Fi',
                'durasi' => 181,
                'rating' => 8.4,
                'trailer_url' => 'https://www.youtube.com/watch?v=TcMBFSGVi1c',
                'poster' => 'https://example.com/posters/avengers_endgame.jpg',
                'is_now_showing' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'The Shawshank Redemption',
                'genre' => 'Drama',
                'durasi' => 142,
                'rating' => 9.3,
                'trailer_url' => 'https://www.youtube.com/watch?v=6hB3S9bIaco',
                'poster' => 'https://example.com/posters/shawshank_redemption.jpg',
                'is_now_showing' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Inception',
                'genre' => 'Action, Sci-Fi, Thriller',
                'durasi' => 148,
                'rating' => 8.8,
                'trailer_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
                'poster' => 'https://example.com/posters/inception.jpg',
                'is_now_showing' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'The Godfather',
                'genre' => 'Crime, Drama',
                'durasi' => 175,
                'rating' => 9.2,
                'trailer_url' => 'https://www.youtube.com/watch?v=sY1S34973zA',
                'poster' => 'https://example.com/posters/godfather.jpg',
                'is_now_showing' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pulp Fiction',
                'genre' => 'Crime, Drama',
                'durasi' => 154,
                'rating' => 8.9,
                'trailer_url' => 'https://www.youtube.com/watch?v=s7EdQ4FqbhY',
                'poster' => 'https://example.com/posters/pulp_fiction.jpg',
                'is_now_showing' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
