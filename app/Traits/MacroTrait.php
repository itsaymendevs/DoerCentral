<?php

namespace App\Traits;

use App\Models\Meal;
use stdClass;

trait MacroTrait
{





    public function getMacro($part, $currentAmount, $isRecursion = false, $totalGrams = 0, $totalCalories = 0, $totalProteins = 0, $totalCarbs = 0, $totalFats = 0, $totalCost = 0)
    {




        // 1: check part-ingredients
        foreach ($part->ingredients ?? [] as $partIngredient) {




            // :: part-ingredientMacro
            $totalSubMacros = $partIngredient?->totalMacro($partIngredient->amount);



            $totalCalories += ($totalSubMacros->calories / $part->totalGrams()) * $currentAmount;
            $totalProteins += ($totalSubMacros->proteins / $part->totalGrams()) * $currentAmount;
            $totalCarbs += ($totalSubMacros->carbs / $part->totalGrams()) * $currentAmount;
            $totalFats += ($totalSubMacros->fats / $part->totalGrams()) * $currentAmount;
            $totalCost += ($totalSubMacros->cost / $part->totalGrams()) * $currentAmount;


        } // end loop









        // --------------------------------------------------
        // --------------------------------------------------








        // 1.2: check part-otherParts => send original-part
        foreach ($part->parts ?? [] as $mealPart) {



            // :: MacroHelper - recursion
            $partMacro = $this->getMacro($mealPart->part, $currentAmount, true);



            // 1.3: appendToTotal
            $totalCalories += round($partMacro[1] ?? 0, 2);
            $totalProteins += round($partMacro[2] ?? 0, 2);
            $totalCarbs += round($partMacro[3] ?? 0, 2);
            $totalFats += round($partMacro[4] ?? 0, 2);
            $totalCost += round($partMacro[5] ?? 0, 2);




        } // end loop













        return [$totalGrams, $totalCalories, $totalProteins, $totalCarbs, $totalFats, $totalCost];



    } // end function












    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------










    public function getIngredientsWithGrams($part, $currentAmount, $ingredientsWithGrams, $isRecursion = false)
    {




        // 1: check part-ingredients
        foreach ($part->ingredients ?? [] as $partIngredient) {



            // 1.2: getGrams
            $ingredientsWithGrams[$partIngredient->ingredientId] = ($ingredientsWithGrams[$partIngredient->ingredientId] ?? 0) + (($partIngredient?->amount ?? 0) * $currentAmount);



        } // end loop









        // --------------------------------------------------
        // --------------------------------------------------








        // 1.2: check part-otherParts => send original-part
        foreach ($part->parts ?? [] as $mealPart) {



            // 1.3: MacroHelper - recursion
            $partIngredientsWithGrams = $this->getIngredientsWithGrams($mealPart->part, $currentAmount, $ingredientsWithGrams, true);



            // 1.4: merge
            $ingredientsWithGrams = $ingredientsWithGrams + $partIngredientsWithGrams;




        } // end loop













        return $ingredientsWithGrams;



    } // end function








} // end trait
