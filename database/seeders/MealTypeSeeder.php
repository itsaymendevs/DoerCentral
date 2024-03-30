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
        $types = ['Recipe', 'Meal', 'Sub-recipe', 'Sauce', 'Snack', 'Side', 'Drink'];
        $typesImageFiles = ['Recipe.png', 'Meal.png', 'Sub-recipe.png', 'Sauce.png', 'Snack.png', 'Side.png', 'Drink.png'];



        $typeId = [1, 5, 5, 1, 6, 5, 1, 6, 6, 7];
        $mealTypes = ['Breakfast', 'AM Snack', 'Snack', 'Lunch', 'Lunch Side', 'PM Snack', 'Dinner', 'Dinner Side', 'Side', 'Drink'];
        $mealTypesCuts = ['B', 'AMS', 'S', 'L', 'LS', 'PMS', 'D', 'DS', 'SDE', 'DRK'];



        for ($i = 0; $i < count($types); $i++) {
            Type::create([
                'name' => $types[$i],
                'imageFile' => $typesImageFiles[$i],
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

