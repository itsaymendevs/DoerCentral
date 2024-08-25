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
        $user = ['Manager', 'manager@doer.ae', 'manager@123', '9715590100'];



        User::create([
            'name' => $user[0],
            'email' => $user[1],
            'password' => Hash::make($user[2]),
            'phone' => $user[3],
        ]);



    } // end function



} // end seeder
