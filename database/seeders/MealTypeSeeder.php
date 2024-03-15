<?php

namespace Database\Seeders;

use App\Models\MealType;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $types = ['Meal', 'Sub-recipe', 'Sauce', 'Snack', 'Side', 'Drink'];



        $typeId = [1, 4, 4, 1, 5, 4, 1, 5];
        $mealTypes = ['Breakfast', 'AM Snack', 'Snack', 'Lunch', 'Lunch Side', 'PM Snack', 'Dinner', 'Dinner Side', 'Drink'];
        $mealTypesCuts = ['B', 'AMS', 'S', 'L', 'LS', 'PMS', 'D', 'DS', 'DRK'];



        for ($i = 0; $i < count($types); $i++) {
            Type::create([
                'name' => $types[$i],
            ]);
        } // end loop



        for ($i = 0; $i < count($mealTypes); $i++) {
            MealType::create([
                'name' => $mealTypes[$i],
                'shortName' => $mealTypesCuts[$i],
                'typeId' => $typeId[$i],
            ]);
        } // end loop




    } // end function



} // end seeder

