<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketWisataSeeder extends Seeder
{
    public function run()
    {
        $paketWisata = [
            [
                'nama_paket' => "Malang Raya Tour",
                'id_wisata_1' => 1,
                'id_wisata_2' => 6,
                'id_wisata_3' => 2,
                'harga_paket' => 750000,
                'deskripsi_paket' => "Paket Wisata Liburan ke Malang 2 Hari 1 Malam",
                'foto_paket' => "PaketMalang.png",
                'created_at' => Carbon::now(),
            ],
            [
                'nama_paket' => "Paket Seru Bulan Mei",
                'id_wisata_1' => 7,
                'id_wisata_2' => 8,
                'id_wisata_3' => 2,
                'harga_paket' => 550000,
                'deskripsi_paket' => "Paket Wisata Liburan ke Keliling Air Terjun Eksotis 1 Hari 1 Malam",
                'foto_paket' => "PaketAirTerjun.png",
                'created_at' => Carbon::now(),
            ],
            [
                'nama_paket' => "Wisata Asyik Paket Hemat",
                'id_wisata_1' => 4,
                'id_wisata_2' => 5,
                'id_wisata_3' => 2,
                'harga_paket' => 1350000,
                'deskripsi_paket' => "Jelajahi keindahan 2 kantai yang terpisah oleh Laut yang tenang seharian penuh",
                'foto_paket' => "PaketPantai.png",
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($paketWisata as $paketWisata) {
            DB::table('paket_wisata')->insert($paketWisata);
        }
    }
}