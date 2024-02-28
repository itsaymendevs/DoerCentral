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
        $demos = ['Admin', 'Employee'];

        for ($i = 0; $i < count($demos); $i++) {
            Role::create([
                'name' => $demos[$i],
            ]);
        } // end loop


    } // end function



} // end seeder



