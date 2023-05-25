<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
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