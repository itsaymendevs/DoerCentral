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

        // 1: administrator
        $user = ['Tech Team', 'tech@doer.ae', 'tech@123', '9715590100', 1];



        User::create([
            'name' => $user[0],
            'email' => $user[1],
            'password' => Hash::make($user[2]),
            'phone' => $user[3],
            'roleId' => $user[4],
        ]);







        // ------------------------------------------------------
        // ------------------------------------------------------





        // 1.2: clients
        $user = ['Doer', 'admin@doer.ae', 'doer@123', '9715590100', 1];
        $userAleens = ['Aleens', 'admin@aleens.ae', 'aleens@doer123', '9715590100', 1];
        $userBeHealthy = ['BeHealthy', 'admin@behealthy.ae', 'behealthy@123', '9715590100', 1];
        $userHealthybite = ['Healthybite', 'admin@healthybite.ae', 'healthybite@doer123', '9715590100', 1];
        $userRealmeal = ['RealMeal', 'admin@realmeal.ae', 'realmeal@123', '9715590100', 1];
        $userTest = ['Test', 'admin@test.ae', 'test@123', '9715590100', 1];
        $userBeMoreHealthy = ['Be More Healthy', 'admin@bemorehealthy.ae', 'bemorehealthy@123', '9715590100', 1];
        $userHealthBar = ['The Health Bar', 'admin@thehealthbar.ae', 'thehealthbar@123', '9715590100', 1];
        $userMolly = ['The Health Bar', 'admin@molly.ae', 'molly@123', '9715590100', 1];


        User::create([
            'name' => $userMolly[0],
            'email' => $userMolly[1],
            'password' => Hash::make($userMolly[2]),
            'phone' => $userMolly[3],
            'roleId' => $userMolly[4],
        ]);


    } // end function



} // end seeder
