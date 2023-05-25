<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paketWisata = [
            [
                'nama_paket' => "Malang Raya Tour",
                'id_wisata_1' => 1,
                'id_wisata_2' => 6,
                'harga_paket' => 750000,
                'deskripsi_paket' => "Paket Wisata Liburan ke Malang 2 Hari 1 Malam",
                'foto_paket' => "../resources/Bromo.png",
                'created_at' => Carbon::now(),
            ],
            [
                'nama_paket' => "Wisata Air Terjun",
                'id_wisata_1' => 7,
                'id_wisata_2' => 8,
                'harga_paket' => 550000,
                'deskripsi_paket' => "Paket Wisata Liburan ke Keliling Air Terjun Eksotis 1 Hari 1 Malam",
                'foto_paket' => "../resources/Madakaripura.png",
                'created_at' => Carbon::now(),
            ],
            [
                'nama_paket' => "Wisata Pantai Lot Merah",
                'id_wisata_1' => 4,
                'id_wisata_2' => 5,
                'harga_paket' => 1350000,
                'deskripsi_paket' => "Jelajahi keindahan 2 kantai yang terpisah oleh Laut yang tenang seharian penuh",
                'foto_paket' => "../resources/PulauMerah.png",
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($paketWisata as $paketWisata) {
            DB::table('paket_wisata')->insert($paketWisata);
        }
    }
}