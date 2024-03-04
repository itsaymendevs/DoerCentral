<?php

namespace Database\Seeders;

use App\Models\Diet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DietSeeder extends Seeder
{


    public function run() : void
    {

        // ::root
        $diets = ['Diet 1', 'Diet 2', 'Diet 3'];

        for ($i = 0; $i < count($diets); $i++) {
            Diet::create([
                'name' => $diets[$i],
                'desc' => 'Description',
            ]);
        } // end loop


    } // end function



} // end seeder



