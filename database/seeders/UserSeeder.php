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
        $userAleens = ['Aleens', 'admin@aleens.ae', 'aleens@doer123', '9715590100', 1];
        $userBeHealthy = ['BeHealthy', 'admin@behealthy.ae', 'behealthy@123', '9715590100', 1];
        $userHealthybite = ['Healthybite', 'admin@healthybite.ae', 'healthybite@doer123', '9715590100', 1];
        $userRealmeal = ['RealMeal', 'admin@realmeal.ae', 'realmeal@123', '9715590100', 1];
        $userTest = ['Test', 'admin@test.ae', 'test@123', '9715590100', 1];
        $userBeMoreHealthy = ['Be More Healthy', 'admin@bemorehealthy.ae', 'bemorehealthy@123', '9715590100', 1];
        $userHealthBar = ['The Health Bar', 'admin@thehealthbar.ae', 'thehealthbar@123', '9715590100', 1];


        User::create([
            'name' => $userHealthBar[0],
            'email' => $userHealthBar[1],
            'password' => Hash::make($userHealthBar[2]),
            'phone' => $userHealthBar[3],
            'roleId' => $userHealthBar[4],
        ]);


    } // end function



} // end seeder
