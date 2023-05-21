<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'status' => 'Belum Dibayar',
            ],
            [
                'status' => 'Lunas',   
            ],
        ];

        foreach ($statuses as $statuses) {
            DB::table('status')->insert($statuses);
        }
    }
}
