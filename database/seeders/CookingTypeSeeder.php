<?php

namespace Database\Seeders;

use App\Models\CookingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CookingTypeSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $cookingTypes = ['Boiled or stewed', 'Baked or roasted', 'Fry or griddle', 'Grill or broil', 'Deep fried', 'Toasted', 'Contact fried', 'Mixed', 'Microwaved', ''];






        foreach ($cookingTypes ?? [] as $cookingType) {


            CookingType::create([
                'name' => $cookingType,
            ]);


        } // end loop



    } // end function



} // end seeder
