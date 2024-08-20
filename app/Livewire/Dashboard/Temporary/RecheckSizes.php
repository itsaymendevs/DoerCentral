<?php

namespace App\Livewire\Dashboard\Temporary;

use App\Models\Meal;
use App\Models\MealIngredient;
use App\Models\MealPart;
use Livewire\Component;

class RecheckSizes extends Component
{
    public function render()
    {


        // 1: getMeals
        $meals = Meal::all();




        // 1.2: loop - meals
        foreach ($meals ?? [] as $meal) {




            // 1.3: current [ingredients - parts]
            $parts = $meal?->parts?->pluck('partId')?->toArray() ?? [];
            $ingredients = $meal?->ingredients?->pluck('ingredientId')?->toArray() ?? [];




            // 1.4: getMealSizes
            $mealSizes = $meal?->sizes?->pluck('id')?->toArray() ?? [];






            // 2: loop - mealSizes
            foreach ($mealSizes as $mealSizeId) {






                // 2.1: loop - ingredients
                foreach ($ingredients as $ingredientId) {



                    // 2.2: checkExists
                    $mealIngredient = MealIngredient::where('mealId', $meal->id)
                            ?->where('ingredientId', $ingredientId)?->where('mealSizeId', $mealSizeId)?->first();




                    // 2.3: create instance
                    if (! $mealIngredient) {




                        // 2.4: getOtherSimilar
                        $similarMealIngredient = MealIngredient::where('mealId', $meal->id)
                                ?->where('ingredientId', $ingredientId)?->first();




                        $part = new MealIngredient();
                        $part->ingredientId = $ingredientId;
                        $part->ingredientBrandId = $similarMealIngredient?->partBrandId ?? null;



                        // 2.2: partType - cookingType
                        $part->partType = $similarMealIngredient->partType ?? null;
                        $part->partType == 'Main' ? $part->cookingTypeId = $similarMealIngredient->cookingTypeId ?? null : null;






                        // 2.3: brand - meal - mealSize - groupToken
                        $part->mealId = $meal->id;
                        $part->mealSizeId = $mealSizeId;
                        $part->groupToken = $similarMealIngredient?->groupToken ?? null;








                        // 2.4: amount
                        $part->amount = 0;
                        $part->remarks = $similarMealIngredient->remarks ?? null;





                        // 2.5: default - removable
                        $part->isDefault = true;
                        $part->isRemovable = $similarMealIngredient->isRemovable ?? false;
                        $part->isDefault = $similarMealIngredient->isDefault ?? false;




                        $part->save();


                    } // end if


                } // end loop








                // -----------------------------------------------------
                // -----------------------------------------------------
                // -----------------------------------------------------
                // -----------------------------------------------------







                // 3: parts

                // 3.1: loop - parts
                foreach ($parts as $partId) {



                    // 2.2: checkExists
                    $mealPart = MealPart::where('mealId', $meal->id)
                            ?->where('partId', $partId)?->where('mealSizeId', $mealSizeId)?->first();




                    // 3.3: create instance
                    if (! $mealPart) {




                        // 3.4: getOtherSimilar
                        $similarMealPart = MealPart::where('mealId', $meal->id)?->where('partId', $partId)?->first();




                        $part = new MealPart();
                        $part->partId = $partId;
                        $part->typeId = $similarMealPart->typeId ?? null;



                        // 2.2: partType - cookingType
                        $part->partType = $similarMealPart->partType ?? null;
                        $part->partType == 'Main' ? $part->cookingTypeId = $similarMealPart->cookingTypeId ?? null : null;






                        // 2.3: brand - meal - mealSize - groupToken
                        $part->mealId = $meal->id;
                        $part->mealSizeId = $mealSizeId;
                        $part->groupToken = $similarMealPart?->groupToken ?? null;








                        // 2.4: amount
                        $part->amount = 0;
                        $part->remarks = $similarMealPart->remarks ?? null;





                        // 2.5: default - removable
                        $part->isDefault = true;
                        $part->isRemovable = $similarMealPart->isRemovable ?? false;
                        $part->isDefault = $similarMealPart->isDefault ?? false;




                        $part->save();


                    } // end if


                } // end loop





            } // end loop



        } // end loop



        return view('livewire.dashboard.temporary.recheck-sizes');


    } // end function


} // end class
