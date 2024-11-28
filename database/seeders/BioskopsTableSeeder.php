<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BioskopsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bioskops')->insert([
            [
                'nama' => 'Cineplex 21',
                'alamat' => 'Jl. Sudirman No. 1',
                'kota' => 'Jakarta',
                'jenis' => 'Multiplex',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'XXI Plaza Senayan',
                'alamat' => 'Jl. Asia Afrika No. 8',
                'kota' => 'Jakarta',
                'jenis' => 'Multiplex',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'CGV Blitz',
                'alamat' => 'Jl. Pahlawan No. 10',
                'kota' => 'Bandung',
                'jenis' => 'Multiplex',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bioskop 21',
                'alamat' => 'Jl. Merdeka No. 5',
                'kota' => 'Surabaya',
                'jenis' => 'Multiplex',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bioskop Kecil',
                'alamat' => 'Jl. Kecil No. 2',
                'kota' => 'Yogyakarta',
                'jenis' => 'Indie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more bioskops as needed
        ]);
    }
}
