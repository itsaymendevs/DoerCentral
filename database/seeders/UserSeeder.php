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
        $userAleens = ['Aleens', 'admin-1@aleens.ae', 'aleens@doer123', '9715590100', 1];
        $userBeHealthy = ['BeHealthy', 'admin@behealthy.ae', 'behealthy@123', '9715590100', 1];
        $userHealthybite = ['Healthybite', 'admin@healthybite.ae', 'healthybite@123', '9715590100', 1];
        $userRealmeal = ['RealMeal', 'admin@realmeal.ae', 'realmeal@123', '9715590100', 1];
        $userTest = ['Test', 'admin@test.ae', 'test@123', '9715590100', 1];


        User::create([
            'name' => $userAleens[0],
            'email' => $userAleens[1],
            'password' => Hash::make($userAleens[2]),
            'phone' => $userAleens[3],
            'roleId' => $userAleens[4],
        ]);


    } // end function



} // end seeder
