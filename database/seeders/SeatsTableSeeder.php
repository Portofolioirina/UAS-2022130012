<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatsTableSeeder extends Seeder
{
    public function run()
    {
        $showtimeIds = [1, 2, 3, 4];

        foreach ($showtimeIds as $showtimeId) {
            for ($i = 1; $i <= 50; $i++) {
                DB::table('seats')->insert([
                    'showtime_id' => $showtimeId,
                    'seat_number' => 'A' . $i,
                    'status' => 'available',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
