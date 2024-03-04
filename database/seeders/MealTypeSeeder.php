<?php

namespace Database\Seeders;

use App\Models\MealType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $mealTypes = ['Breakfast', 'Morning Snack', 'Morning Snack 2', 'Lunch', 'Lunch Side', 'Afternoon Snack', 'Dinner', 'Dinner Side'];

        $mealTypesCuts = ['B', 'MS', 'MS2', 'L', 'LS', 'AS', 'D', 'DS'];



        for ($i = 0; $i < count($mealTypes); $i++) {
            MealType::create([
                'name' => $mealTypes[$i],
                'shortName' => $mealTypesCuts[$i],
            ]);
        } // end loop


    } // end function



} // end seeder

