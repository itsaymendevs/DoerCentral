<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $roles = ['Admin', 'Employee'];

        for ($i = 0; $i < count($roles); $i++) {
            Role::create([
                'name' => $roles[$i],
            ]);
        } // end loop


    } // end function



} // end seeder



