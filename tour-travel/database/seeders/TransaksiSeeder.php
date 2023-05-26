<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $transaksi = [
            [
                'id_pelanggan' => 1,
                'id_paket' => 1,
                'id_status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id_pelanggan' => 1,
                'id_paket' => 1,
                'id_status' => 1,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($transaksi as $transaksi) {
            DB::table('transaksi')->insert($transaksi);
        }
    }
}