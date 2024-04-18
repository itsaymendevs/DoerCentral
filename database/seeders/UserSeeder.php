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
        $userRealmeal = ['RealMeal', 'admin@realmeal.ae', 'realmeal@123', '9715590100', 1];


        User::create([
            'name' => $userRealmeal[0],
            'email' => $userRealmeal[1],
            'password' => Hash::make($userRealmeal[2]),
            'phone' => $userRealmeal[3],
            'roleId' => $userRealmeal[4],
        ]);


    } // end function



} // end seeder
