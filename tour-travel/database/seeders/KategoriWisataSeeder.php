<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_wisata = [
            [
                'id' => 1,
                'kategori_wisata' => "Gunung",
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'kategori_wisata' => "Pantai",
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'kategori_wisata' => "Air Terjun",
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($kategori_wisata as $kategori_wisata) {
            DB::table('kategori_wisata')->insert($kategori_wisata);
        }
    }
}