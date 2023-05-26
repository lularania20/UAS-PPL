<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = new User();
        $data->name = "Admin"; 
        $data->email = "admin@gmail.com"; 
        $data->password = Hash::make('admin123'); 

        $data->save();
    }
}
