<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientMacro;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class IngredientSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $ingredients = Storage::disk('public')->get('sources/Ingredients.json');
        $ingredients = json_decode($ingredients, true);


        for ($i = 0; $i < count($ingredients); $i++) {



            // 1: getUnit - purchaseUnit
            $unit = Unit::where('name', $ingredients[$i]['unit'])->first();
            $purchaseUnit = Unit::where('name', $ingredients[$i]['purchaseUnit'])->first();




            // 1.2: create ingredient
            $ingredient = Ingredient::create([


                // 1: general
                'name' => $ingredients[$i]['name'],
                'desc' => $ingredients[$i]['desc'] ?? null,
                'usage' => $ingredients[$i]['usage'] ?? null,

                'wastage' => $ingredients[$i]['wastage'] ?? 0,
                'increment' => $ingredients[$i]['increment'] ?? 0,
                'decrement' => $ingredients[$i]['decrement'] ?? 0,


                'referenceID' => $ingredients[$i]['referenceID'] ?? null,
                'imageFile' => $ingredients[$i]['imageFile'] ?? null,




                // 1.2: exclude - allergy
                'unitId' => $unit->id ?? null,
                'purchaseUnitId' => $purchaseUnit->id ?? null,




                // 1.3: group - category
                'groupId' => $ingredients[$i]['groupId'],
                'categoryId' => $ingredients[$i]['categoryId'],



                // 1.4: exclude - allergy
                'allergyId' => $ingredients[$i]['allergyId'],
                'excludeId' => $ingredients[$i]['excludeId'],


            ]);










            // 2: create macros
            IngredientMacro::create([



                // 2.1: general
                'ingredientType' => $ingredients[$i]['IngredientType'],
                'calories' => $ingredients[$i]['calories'] ?? 0,
                'proteins' => $ingredients[$i]['proteins'] ?? 0,
                'carbs' => $ingredients[$i]['carbs'] ?? 0,




                // 2.2: macros
                'fats' => $ingredients[$i]['fats'] ?? 0,
                'cholesterol' => $ingredients[$i]['cholesterol'] ?? 0,
                'sodium' => $ingredients[$i]['sodium'] ?? 0,
                'fiber' => $ingredients[$i]['fiber'] ?? 0,
                'sugar' => $ingredients[$i]['sugar'] ?? 0,


                'calcium' => $ingredients[$i]['calcium'] ?? 0,
                'iron' => $ingredients[$i]['iron'] ?? 0,
                'vitaminA' => $ingredients[$i]['vitaminA'] ?? 0,
                'vitaminC' => $ingredients[$i]['vitaminC'] ?? 0,




                // 2.3: ingredient
                'ingredientId' => $ingredient->id,


            ]);






        } // end loop



    } // end function



} // end seeder




