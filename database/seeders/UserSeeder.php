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
      $user = ['Admin', 'admin@doer.ae', '9715590100', 1];

      User::create([
         'name' => $user[0],
         'password' => Hash::make('123456'),
         'email' => $user[1],
         'phone' => $user[2],
         'roleId' => $user[3],
      ]);


   } // end function



} // end seeder
