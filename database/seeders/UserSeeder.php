<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run() : void
    {

        // ::root
        $demos = ['Admin', 'admin@lfm.ae', '9715590100', 1];

        User::create([
            'name' => $demos[0],
            'password' => Hash::make('123456'),
            'email' => $demos[1],
            'phone' => $demos[2],
            'roleId' => $demos[3],
        ]);


    } // end function



} // end seeder
