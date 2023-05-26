<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KategoriWisataSeeder::class,
            StatusSeeder::class,
            TransaksiSeeder::class,
            PelangganSeeder::class,
            WisataSeeder::class,
            PaketWisataSeeder::class,
            UserSeeder::class,
        ]);
    }
}