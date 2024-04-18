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
        $user = ['Doer', 'admin@doer.ae', 'doer@123', '9715590100', 1];
        $userAleens = ['Aleens', 'admin@aleens.ae', 'aleens@123', '9715590100', 1];
        $userBeHealthy = ['BeHealthy', 'admin@behealthy.ae', 'behealthy@123', '9715590100', 1];
        $userHealthybite = ['Healthybite', 'admin@healthybite.ae', 'healthybite@123', '9715590100', 1];


        User::create([
            'name' => $userHealthybite[0],
            'email' => $userHealthybite[1],
            'password' => Hash::make($userHealthybite[2]),
            'phone' => $userHealthybite[3],
            'roleId' => $userHealthybite[4],
        ]);


    } // end function



} // end seeder
