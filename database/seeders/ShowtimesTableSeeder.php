<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShowtimesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('showtimes')->insert([
            [
                'bioskop_id' => 1, // Assuming this ID exists in the bioskop table
                'movie_id' => 1,   // Assuming this ID exists in the movies table
                'screen' => 'Screen 1',
                'start_time' => Carbon::createFromTimeString('2024-11-28 14:00:00'),
                'end_time' => Carbon::createFromTimeString('2024-11-28 16:30:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bioskop_id' => 1,
                'movie_id' => 2,
                'screen' => 'Screen 2',
                'start_time' => Carbon::createFromTimeString('2024-11-28 17:00:00'),
                'end_time' => Carbon::createFromTimeString('2024-11-28 19:30:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bioskop_id' => 2,
                'movie_id' => 1,
                'screen' => 'Screen 1',
                'start_time' => Carbon::createFromTimeString('2024-11-28 15:00:00'),
                'end_time' => Carbon::createFromTimeString('2024-11-28 17:30:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bioskop_id' => 2,
                'movie_id' => 3,
                'screen' => 'Screen 3',
                'start_time' => Carbon::createFromTimeString('2024-11-28 18:00:00'),
                'end_time' => Carbon::createFromTimeString('2024-11-28 20:30:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
