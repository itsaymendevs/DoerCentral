<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{

    public function run() : void
    {

        // ::root
        $cuisines = ['Egyption', 'Indian', 'Chinese', 'Lebanese', 'Korean', 'Saudi'];

        for ($i = 0; $i < count($cuisines); $i++) {
            Cuisine::create([
                'name' => $cuisines[$i],
            ]);
        } // end loop


    } // end function



} // end seeder
