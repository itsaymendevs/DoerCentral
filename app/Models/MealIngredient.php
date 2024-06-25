<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

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












    public function totalMacro($currentAmount = 0)
    {


        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = $totalCost = 0;






        // 1: ingredients
        $ingredient = $this->ingredient()->first();




        // 1.2: ingredientMacro
        $totalCalories += ($ingredient?->freshMacro()?->calories ?? 0) * $currentAmount;
        $totalProteins += ($ingredient?->freshMacro()?->proteins ?? 0) * $currentAmount;
        $totalCarbs += ($ingredient?->freshMacro()?->carbs ?? 0) * $currentAmount;
        $totalFats += ($ingredient?->freshMacro()?->fats ?? 0) * $currentAmount;
        $totalCost += ($ingredient?->latestPricePerGram() ?? 0) * $currentAmount;







        // :: create instance
        $totalMacros = new stdClass();

        $totalMacros->calories = round($totalCalories, 2);
        $totalMacros->proteins = round($totalProteins, 2);
        $totalMacros->carbs = round($totalCarbs, 2);
        $totalMacros->fats = round($totalFats, 2);
        $totalMacros->cost = round($totalCost, 2);



        return $totalMacros;




    } // end function


















    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------







} // end model




