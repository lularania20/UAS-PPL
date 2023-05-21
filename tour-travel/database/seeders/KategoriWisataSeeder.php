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
                'kategori_wisata' => "Gunung",
                'created_at' => Carbon::now(),
            ],
            [
                'kategori_wisata' => "Sungai",
                'created_at' => Carbon::now(),
            ],
            [
                'kategori_wisata' => "Lembah",
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($kategori_wisata as $kategori_wisata) {
            DB::table('kategori_wisata')->insert($kategori_wisata);
        }
    }
}