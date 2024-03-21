<?php

namespace App\Traits;

use App\Models\Meal;
use stdClass;

trait MacroTrait
{





    public function getMacro($itemId, $itemType, $itemAmount, $totalCalories, $totalProteins, $totalCarbs, $totalFats)
    {


        // :: getItem
        $item = Meal::find($itemId);






        // 1: check ingredients
        foreach ($item->ingredients as $itemIngredient) {


            // :: ingredientMacro
            $totalSubMacros = $itemIngredient?->totalMacro($itemIngredient->amount ?? 0);


            $totalCalories += $totalSubMacros->calories * ($itemAmount ?? 0);
            $totalProteins += $totalSubMacros->proteins * ($itemAmount ?? 0);
            $totalCarbs += $totalSubMacros->carbs * ($itemAmount ?? 0);
            $totalFats += $totalSubMacros->fats * ($itemAmount ?? 0);

        } // end loop






        // 1.2: check subRecipes
        foreach ($item->subRecipes as $itemSubRecipe) {



            // :: recursion
            return $this->getMacro($itemSubRecipe->subRecipeId, $itemSubRecipe->type, $itemSubRecipe->amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats);

        } // end loop







        // 1.3: check sauces
        foreach ($item->sauces as $itemSauce) {


            // :: recursion
            return $this->getMacro($itemSauce->sauceId, $itemSauce->type, $itemSauce->amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats);

        } // end loop






        // 1.4: check snacks
        foreach ($item->snacks as $itemSnack) {




            // :: recursion
            return $this->getMacro($itemSnack->snackId, $itemSnack->type, $itemSnack->amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats);

        } // end loop








        // 1.5: check sides
        foreach ($item->sides as $itemSide) {



            // :: recursion
            return $this->getMacro($itemSide->sideId, $itemSide->type, $itemSide->amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats);

        } // end loop






        // 1.6: check drinks
        foreach ($item->drinks as $itemDrink) {


            // :: recursion
            return $this->getMacro($itemDrink->drinkId, $itemDrink->type, $itemDrink->amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats);

        } // end loop




        return [$totalCalories, $totalProteins, $totalCarbs, $totalFats];



    } // end function








} // end trait
