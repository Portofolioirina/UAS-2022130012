<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bioskop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MoviesTableSeeder::class);
        $this->call(BioskopsTableSeeder::class);
        $this->call(ShowtimesTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
    }
}
