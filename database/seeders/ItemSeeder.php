<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\MealServing;
use App\Models\MealSize;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{

    public function run() : void
    {



        // :: mealTypes
        $generalTypes = ['Meal', 'Sub-recipe', 'Sauce', 'Snack', 'Side', 'Drink'];







        // :: loop - generalTypes
        foreach ($generalTypes as $generalType) {





            // ::root
            $meals = Storage::disk('public')->get("sources/items/{$generalType}.json");
            $meals = $meals ? json_decode($meals, true) : [];








            // 1: loop - meals - general
            for ($i = 0; $i < count($meals); $i++) {



                // 1.2: dependencies
                $type = Type::where('name', $generalType)->first();




                // 1.3: createMeal
                $meal = Meal::create([

                    'migrationId' => $meals[$i]['id'] ?? null,

                    'name' => $meals[$i]['name'] ?? null,
                    'generalName' => $meals[$i]['generalName'] ?? null,
                    'desc' => $meals[$i]['desc'] ?? null,


                    'typeId' => $type->id,
                    'partType' => $meals[$i]['partType'] ?? null,

                    'validity' => $meals[$i]['validity'] ?? 0,
                    'category' => $meals[$i]['category'] ?? null,

                    'imageFile' => $meals[$i]['imageFile'] ?? null,
                    'secondImageFile' => $meals[$i]['secondImageFile'] ?? null,
                    'thirdImageFile' => $meals[$i]['thirdImageFile'] ?? null,
                    'fourthImageFile' => $meals[$i]['fourthImageFile'] ?? null,

                    'containerId' => $meals[$i]['containerId'] ?? null,
                    'dietId' => $meals[$i]['dietId'] ?? null,
                    'cuisineId' => $meals[$i]['cuisineId'] ? intval($meals[$i]['cuisineId']) - 3 : null,


                ]);










                // --------------------------------------------
                // --------------------------------------------






                // 2: create mealServing
                $serving = new MealServing();
                $serving->mealId = $meal->id;

                $serving->save();







                // --------------------------------------------
                // --------------------------------------------







                // 3: create MealSizes


                // 3.1: getSize
                $size = Size::where('name', 'Item Size')->first();






                // 3.2: create
                $mealSize = new MealSize();

                $mealSize->mealId = $meal->id;
                $mealSize->sizeId = $size->id;



                // 3.3: afterCookMacros
                $mealSize->afterCookCalories = $meals[$i]['afterCookCalories'] ?? 0;
                $mealSize->afterCookProteins = $meals[$i]['afterCookProteins'] ?? 0;
                $mealSize->afterCookCarbs = $meals[$i]['afterCookCarbs'] ?? 0;
                $mealSize->afterCookFats = $meals[$i]['afterCookFats'] ?? 0;


                $mealSize->save();






            } // end loop








            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------









            // :: dependencies
            $meals = Meal::all();







            // :: loop - meals - ingredients / parts
            foreach ($meals as $meal) {





                // 4: create MealIngredients





                // :: getMealSize - groupToken - limitLatestIngredient
                $mealSize = $meal->sizes->first();
                $groupToken = $mealSize->id . date('dmYhisA') . rand(999, 999999) . rand(74921, 99999) . rand(74921, 99999) . rand(74921, 99999);








                // :: root
                $mealIngredients = Storage::disk('public')->get("sources/items/{$generalType}Ingredients.json");
                $mealIngredients = $mealIngredients ? json_decode($mealIngredients, true) : [];












                // 4.1: loop - ingredients
                for ($y = 0; $y < count($mealIngredients); $y++) {






                    // :: partOfMeal
                    if ($meal->migrationId == $mealIngredients[$y]['mealId']) {






                        // 4.1.5: getMigrationIngredient
                        $migrationIngredient = Ingredient::where('migrationId', $mealIngredients[$y]['ingredientId'])?->first();







                        // 4.2: createIngredient
                        $mealIngredient = MealIngredient::create([


                            'ingredientId' => $migrationIngredient->id ?? null,

                            'partType' => $mealIngredients[$y]['partType'] ?? null,
                            'amount' => $mealIngredients[$y]['amount'] ?? 0,

                            'remarks' => $mealIngredients[$y]['remarks'] ?? null,
                            'groupToken' => $groupToken,
                            'isReplacement' => false,
                            'isRemovable' => boolval($mealIngredients[$y]['isRemovable']) ?? false,

                            'mealId' => $meal->id ?? null,
                            'mealSizeId' => $mealSize->id ?? null,


                        ]);

                    } // end if

                } // end loop - ingredients













                // --------------------------------------------
                // --------------------------------------------











                // 5: create MealParts



                // ::root
                $mealParts = Storage::disk('public')->get("sources/items/{$generalType}Parts.json");
                $mealParts = $mealParts ? json_decode($mealParts, true) : [];






                // 5.1: loop - mealParts
                for ($y = 0; $y < count($mealParts); $y++) {



                    // 5.2: getType
                    $partType = Type::where('name', $mealParts[$y]['type'])->first();







                    // :: partOfMeal
                    if ($meal->migrationId == $mealParts[$y]['mealId']) {






                        // 5.2.5: getMigrationPart
                        $migrationPart = Meal::where('migrationId', $mealParts[$y]['partId'])?->first();





                        // 5.3: createPart
                        $mealPart = MealPart::create([


                            'partId' => $migrationPart->id ?? null,
                            'typeId' => $partType->id,

                            'partType' => $mealParts[$y]['partType'] ?? null,
                            'amount' => $mealParts[$y]['amount'] ?? 0,

                            'remarks' => $mealParts[$y]['remarks'] ?? null,
                            'groupToken' => $groupToken,
                            'isReplacement' => false,
                            'isRemovable' => boolval($mealParts[$y]['isRemovable']) ?? false,

                            'mealId' => $meal->id ?? null,
                            'mealSizeId' => $mealSize->id ?? null,


                        ]);

                    } // end if

                } // end loop - parts







            } // end loop - meals







        } // end loop - generalTypes




    } // end function

} // end seeder

