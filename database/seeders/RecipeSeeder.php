<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealAvailableType;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\MealServing;
use App\Models\MealSize;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class RecipeSeeder extends Seeder
{



    public function run() : void
    {



        // :: mealTypes
        $generalTypes = ['Recipe'];







        // :: loop - generalTypes
        foreach ($generalTypes as $generalType) {





            // ::root
            $meals = Storage::disk('public')->get("sources/recipes/_{$generalType}.json");
            $meals = $meals ? json_decode($meals, true) : [];



            // :: dependencies
            $type = Type::where('name', $generalType)->first();









            // 1: loop - meals - general
            for ($i = 0; $i < count($meals); $i++) {





                // 1.3: createMeal
                $meal = Meal::create([

                    'migrationId' => $meals[$i]['id'] ?? null,
                    'name' => $meals[$i]['name'] ?? null,
                    'typeId' => $type->id,

                    'validity' => $meals[$i]['validity'] ?? 0,
                    'category' => $meals[$i]['category'] ?? null,

                    'containerId' => $meals[$i]['containerId'] ?? null,
                    'cuisineId' => null,


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
                $sizes = Size::whereIn('shortName', ['S', 'M', 'L'])->get();





                // :: loop - sizes
                foreach ($sizes as $size) {


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




                } // end loop - sizes




            } // end loop









            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------












            // :: dependencies
            $meals = Meal::where('typeId', $type->id)->get();





            // ::root - mealsExtra
            $mealsExtra = Storage::disk('public')->get("sources/recipes/{$generalType}.json");
            $mealsExtra = $mealsExtra ? json_decode($mealsExtra, true) : [];




            // :: root - recipeTypes
            $recipeTypes = Storage::disk('public')->get("sources/recipes/{$generalType}MealTypes.json");
            $recipeTypes = $recipeTypes ? json_decode($recipeTypes, true) : [];










            // 3.5: loop - meals
            foreach ($meals as $meal) {




                // 3.6: loop - mealsExtra
                for ($y = 0; $y < count($mealsExtra); $y++) {


                    if ($meal->migrationId == $mealsExtra[$y]['mealId']) {




                        // 1.3: createMeal
                        $meal->update([

                            'desc' => $mealsExtra[$y]['desc'] ?? null,
                            'partType' => $mealsExtra[$y]['partType'] ?? null,

                            'imageFile' => $mealsExtra[$y]['imageFile'] ?? null,
                            'secondImageFile' => $mealsExtra[$y]['secondImageFile'] ?? null,
                            'thirdImageFile' => $mealsExtra[$y]['thirdImageFile'] ?? null,
                            'fourthImageFile' => $mealsExtra[$y]['fourthImageFile'] ?? null,

                            'dietId' => $mealsExtra[$y]['dietId'] ?? null,

                        ]);








                        // 3.7: loop - recipeTypes
                        for ($p = 0; $p < count($recipeTypes); $p++) {


                            if ($mealsExtra[$y]['id'] == $recipeTypes[$p]['mealId']) {


                                // 1.3: createType
                                MealAvailableType::create([

                                    'mealId' => $meal->id,
                                    'mealTypeId' => $recipeTypes[$p]['mealTypeId'],

                                ]);


                            } // end if



                        } // end loop - recipeTypes




                    } // end if














                } // end loop - mealsExtra





















            } // end loop - meals

























            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------
            // --------------------------------------------------






            // :: dependencies
            $meals = Meal::where('typeId', $type->id)->get();







            // :: loop - meals - ingredients / parts
            foreach ($meals as $meal) {





                // 4: create MealIngredients




                // 4.0.5: loop - mealSizes
                $mealSizes = $meal->sizes;

                foreach ($mealSizes ?? [] as $mealSize) {



                    // :: groupToken
                    $groupToken = $mealSize->id . date('dmYhisA') . rand(999, 999999) . rand(74921, 99999) . rand(74921, 99999) . rand(74921, 99999);








                    // :: root
                    $mealIngredients = Storage::disk('public')->get("sources/recipes/{$generalType}Ingredients.json");
                    $mealIngredients = $mealIngredients ? json_decode($mealIngredients, true) : [];












                    // 4.1: loop - ingredients
                    for ($y = 0; $y < count($mealIngredients); $y++) {






                        // :: partOfMeal - sameSize
                        if ($meal->migrationId == $mealIngredients[$y]['mealId'] && $mealSize->sizeId == $mealIngredients[$y]['sizeId']) {






                            // 4.1.5: getMigrationIngredient
                            $migrationIngredient = Ingredient::where('migrationId', $mealIngredients[$y]['ingredientId'])?->first();







                            // 4.2: createIngredient
                            $mealIngredient = MealIngredient::create([


                                'ingredientId' => $migrationIngredient->id ?? null,

                                'partType' => $mealIngredients[$y]['partType'] ?? null,
                                'amount' => $mealIngredients[$y]['amount'] ?? 0,

                                'remarks' => $mealIngredients[$y]['remarks'] ?? null,
                                'groupToken' => $groupToken,
                                'isReplacement' => boolval($mealIngredients[$y]['isReplacement']) ?? false,
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
                    $mealParts = Storage::disk('public')->get("sources/recipes/{$generalType}Parts.json");
                    $mealParts = $mealParts ? json_decode($mealParts, true) : [];






                    // 5.1: loop - mealParts
                    for ($y = 0; $y < count($mealParts); $y++) {



                        // 5.2: getType
                        $partType = Type::where('name', $mealParts[$y]['type'])->first();





                        // :: partOfMeal
                        if ($meal->migrationId == $mealParts[$y]['mealId'] && $mealSize->sizeId == $mealParts[$y]['sizeId']) {






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
                                'isReplacement' => boolval($mealParts[$y]['isReplacement']) ?? false,
                                'isRemovable' => boolval($mealParts[$y]['isRemovable']) ?? false,

                                'mealId' => $meal->id ?? null,
                                'mealSizeId' => $mealSize->id ?? null,


                            ]);

                        } // end if

                    } // end loop - parts







                } // end loop - mealSizes



            } // end loop - meals




        } // end loop - generalTypes




    } // end function

} // end seeder



