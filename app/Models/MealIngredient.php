<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealIngredient extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function ingredient()
    {

        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function










    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($macroType)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;






        // 1: ingredients
        $ingredient = $this->ingredient()->first();



        // 1.2: ingredientMacro
        $totalCalories += $ingredient?->freshMacro()?->calories ?? 0;
        $totalProteins += $ingredient?->freshMacro()?->proteins ?? 0;
        $totalCarbs += $ingredient?->freshMacro()?->carbs ?? 0;
        $totalFats += $ingredient?->freshMacro()?->fats ?? 0;







        // :: return targetMacro
        if ($macroType == 'Calories')
            $targetMacro = $totalCalories;
        elseif ($macroType == 'Proteins')
            $targetMacro = $totalProteins;
        elseif ($macroType == 'Carbs')
            $targetMacro = $totalCarbs;
        elseif ($macroType == 'Fats')
            $targetMacro = $totalFats;



        return $targetMacro;

    } // end function







} // end model




