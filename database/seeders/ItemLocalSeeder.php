<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealAvailableType;
use App\Models\MealIngredient;
use App\Models\MealInstruction;
use App\Models\MealPacking;
use App\Models\MealPart;
use App\Models\MealServing;
use App\Models\MealSize;
use App\Models\MealTag;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ItemLocalSeeder extends Seeder
{



    public function run() : void
    {



        // 1: meals
        $mealsList = [];

        $meals = Storage::disk('public')->get("sources/local/meals.json");
        $meals = $meals ? json_decode($meals, true) : [];
        $meals = collect($meals);





        // :: loop - meals
        foreach ($meals as $key => $meal) {



            // 1: create
            $item = new Meal();



            // 1.2: general
            $item->migrationId = $meal['id'];
            $item->typeId = $meal['typeId'] ?? null;
            $item->name = $meal['name'] ?? null;
            $item->nameURL = $meal['nameURL'] ?? null;
            $item->generalName = $meal['generalName'] ?? null;
            $item->servingPrice = $meal['servingPrice'] ?? null;
            $item->validity = $meal['validity'] ?? null;
            $item->partType = $meal['partType'] ?? null;
            $item->desc = $meal['desc'] ?? null;
            $item->category = $meal['category'] ?? null;




            // 1.3: imageFiles
            $item->imageFile = $meal['imageFile'] ?? null;
            $item->secondImageFile = $meal['secondImageFile'] ?? null;
            $item->thirdImageFile = $meal['thirdImageFile'] ?? null;
            $item->fourthImageFile = $meal['fourthImageFile'] ?? null;

            $item->containerId = $meal['containerId'] ?? null;
            $item->labelId = $meal['labelId'] ?? null;

            $item->kitchenTypeId = $meal['kitchenTypeId'] ?? null;
            $item->dietId = $meal['dietId'] ?? null;
            $item->cuisineId = $meal['cuisineId'] ?? null;



            $item->save();



            array_push($mealsList, $item->id);

        } // end loop






        // ------------------------------------------------------------------
        // ------------------------------------------------------------------





        // :: loop - meals
        $items = Meal::whereIn('id', $mealsList)->get();




        foreach ($items ?? [] as $key => $item) {





            // 2: mealTypes
            $availableTypes = Storage::disk('public')->get("sources/local/meal_available_types.json");
            $availableTypes = json_decode($availableTypes ?? [], true);
            $availableTypes = collect($availableTypes);







            foreach ($availableTypes?->where('mealId', $item->migrationId) ?? [] as $key => $availableType) {



                // 2.1: create
                $mealType = new MealAvailableType();



                $mealType->mealId = $item->id;
                $mealType->mealTypeId = $availableType['mealTypeId'] ?? null;

                $mealType->save();



            } // end function









            // ------------------------------------------------------------------
            // ------------------------------------------------------------------






            // 3: mealTags
            $mealTags = Storage::disk('public')->get("sources/local/meal_tags.json");
            $mealTags = $mealTags ? json_decode($mealTags, true) : [];
            $mealTags = collect($mealTags);




            foreach ($mealTags?->where('mealId', $item->migrationId) ?? [] as $key => $mealTag) {



                // 3.1: create
                $tag = new MealTag();



                $tag->mealId = $item->id;
                $tag->tagId = $mealTag['tagId'];

                $tag->save();



            } // end function










            // ------------------------------------------------------------------
            // ------------------------------------------------------------------






            // 4: mealServings
            $mealServings = Storage::disk('public')->get("sources/local/meal_servings.json");
            $mealServings = $mealServings ? json_decode($mealServings, true) : [];
            $mealServings = collect($mealServings);




            foreach ($mealServings?->where('mealId', $item->migrationId) ?? [] as $key => $mealServing) {



                // 4.1: create
                $serving = new MealServing();



                $serving->mealId = $item->id;
                $serving->desc = $mealServing['desc'] ?? null;
                $serving->useCutlery = $mealServing['useCutlery'] ?? null;




                $serving->save();



            } // end function









            // ------------------------------------------------------------------
            // ------------------------------------------------------------------






            // 5: mealInstructions
            $mealInstructions = Storage::disk('public')->get("sources/local/meal_serving_instructions.json");
            $mealInstructions = $mealInstructions ? json_decode($mealInstructions, true) : [];
            $mealInstructions = collect($mealInstructions);




            foreach ($mealInstructions?->where('mealId', $item->migrationId) ?? [] as $key => $mealInstruction) {



                // 5.1: create
                $instruction = new MealInstruction();



                $instruction->mealId = $item->id;
                $instruction->servingInstructionId = $mealInstruction['servingInstructionId'] ?? null;
                $instruction->isActive = $mealInstruction['isActive'];


                $instruction->save();



            } // end function















            // ------------------------------------------------------------------
            // ------------------------------------------------------------------






            // 6: mealPackings
            $mealPackings = Storage::disk('public')->get("sources/local/meal_packings.json");
            $mealPackings = $mealPackings ? json_decode($mealPackings, true) : [];
            $mealPackings = collect($mealPackings);




            foreach ($mealPackings?->where('mealId', $item->migrationId) ?? [] as $key => $mealPacking) {



                // 7.1: create
                $packing = new MealPacking();


                $packing->mealId = $item->id;
                $packing->name = $mealPacking['name'];

                $packing->amount = $mealPacking['amount'];
                $packing->remarks = $mealPacking['remarks'];


                $packing->save();



            } // end function











            // ------------------------------------------------------------------
            // ------------------------------------------------------------------






            // 7: mealSizes
            $mealSizes = Storage::disk('public')->get("sources/local/meal_sizes.json");
            $mealSizes = $mealSizes ? json_decode($mealSizes, true) : [];
            $mealSizes = collect($mealSizes);



            // 7.2: getSizes (auto might mismatch)
            $migratedSizes = Storage::disk('public')->get("sources/local/sizes.json");
            $migratedSizes = $migratedSizes ? json_decode($migratedSizes, true) : [];
            $migratedSizes = collect($migratedSizes);




            foreach ($mealSizes?->where('mealId', $item->migrationId) ?? [] as $key => $mealSize) {


                // 7.3: getMatchedSize
                $migratedSize = $migratedSizes?->where('id', $mealSize['sizeId'])?->first();
                $targetSize = Size::where('shortName', $migratedSize['shortName'])?->first();





                // 7.4: create
                if ($targetSize) {


                    $size = new MealSize();

                    $size->mealId = $item->id;


                    $size->afterCookGrams = $mealSize['afterCookGrams'];
                    $size->afterCookCalories = $mealSize['afterCookCalories'];
                    $size->afterCookProteins = $mealSize['afterCookProteins'];
                    $size->afterCookCarbs = $mealSize['afterCookCarbs'];
                    $size->afterCookFats = $mealSize['afterCookFats'];
                    $size->afterCookCost = $mealSize['afterCookCost'];

                    $size->price = $mealSize['price'];
                    $size->yield = $mealSize['yield'];

                    $size->numberOfServing = $mealSize['numberOfServing'];
                    $size->totalServingGrams = $mealSize['totalServingGrams'];
                    $size->pricePerServing = $mealSize['pricePerServing'];
                    $size->gramsPerServing = $mealSize['gramsPerServing'];


                    $size->sizeId = $targetSize->id;


                    $size->save();





                    // ---------------------------------------
                    // ---------------------------------------






                    // 7.5: ingredients
                    $mealIngredients = Storage::disk('public')->get("sources/local/meal_ingredients.json");
                    $mealIngredients = $mealIngredients ? json_decode($mealIngredients, true) : [];
                    $mealIngredients = collect($mealIngredients);





                    foreach ($mealIngredients?->where('mealId', $item->migrationId)?->where('mealSizeId', $mealSize['id']) ?? [] as $key => $mealIngredient) {




                        // 7.5.1: create
                        $ingredient = new MealIngredient();



                        $ingredient->mealId = $item->id;
                        $ingredient->mealSizeId = $size->id;


                        $ingredient->ingredientId = $mealIngredient['ingredientId'];
                        $ingredient->ingredientBrandId = $mealIngredient['ingredientBrandId'];
                        $ingredient->cookingTypeId = $mealIngredient['cookingTypeId'];
                        $ingredient->partType = $mealIngredient['partType'];
                        $ingredient->amount = $mealIngredient['amount'];
                        $ingredient->remarks = $mealIngredient['remarks'];
                        $ingredient->groupToken = $mealIngredient['groupToken'];
                        $ingredient->isRemovable = $mealIngredient['isRemovable'];
                        $ingredient->isDefault = $mealIngredient['isDefault'];



                        $ingredient->save();



                    } // end function










                    // ---------------------------------------
                    // ---------------------------------------






                    // 7.6: parts
                    $mealParts = Storage::disk('public')->get("sources/local/meal_parts.json");
                    $mealParts = $mealParts ? json_decode($mealParts, true) : [];
                    $mealParts = collect($mealParts);





                    foreach ($mealParts?->where('mealId', $item->migrationId)?->where('mealSizeId', $mealSize['id']) ?? [] as $key => $mealPart) {




                        // 7.6.1: create
                        $part = new MealPart();



                        $part->mealId = $item->id;
                        $part->mealSizeId = $size->id;


                        // 7.6.2: getMigrationId
                        $otherPart = Meal::whereIn('id', $mealsList)?->where('migrationId', $mealPart['partId'])?->first();

                        $part->partId = $otherPart->id;
                        $part->typeId = $mealPart['typeId'];

                        $part->cookingTypeId = $mealPart['cookingTypeId'];
                        $part->partType = $mealPart['partType'];
                        $part->amount = $mealPart['amount'];
                        $part->remarks = $mealPart['remarks'];
                        $part->groupToken = $mealPart['groupToken'];
                        $part->isRemovable = $mealPart['isRemovable'];
                        $part->isDefault = $mealPart['isDefault'];



                        $part->save();



                    } // end function








                } // end if - sizeExists




            } // end function











            // ------------------------------------------------------------------
            // ------------------------------------------------------------------












        } // end loop - meals







    } // end function


} // end class
