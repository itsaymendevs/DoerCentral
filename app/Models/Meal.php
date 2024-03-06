<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;



    public function tags()
    {

        return $this->hasMany(MealTag::class, 'mealId');

    } // end function





    public function instructions()
    {

        return $this->hasMany(MealInstruction::class, 'mealId');

    } // end function





    public function sizes()
    {

        return $this->hasMany(MealSize::class, 'mealId');

    } // end function





    public function types()
    {

        return $this->hasMany(MealAvailableType::class, 'mealId');

    } // end function






    public function typesInArray()
    {


        // 1: getTypes - loop
        $typesInArray = [];
        $availableTypes = $this->types()->get();



        foreach ($availableTypes as $availableType) {

            array_push($typesInArray, $availableType->mealType->name);

        } // end loop


        return $typesInArray ? $typesInArray : ['Not Assigned'];


    } // end function














    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------





    public function ingredients()
    {

        return $this->hasMany(MealIngredient::class, 'mealId');

    } // end function




    public function subRecipes()
    {

        return $this->hasMany(MealSubRecipe::class, 'mealId');

    } // end function






    public function snacks()
    {

        return $this->hasMany(MealSnack::class, 'mealId');

    } // end function




    public function sides()
    {

        return $this->hasMany(MealSide::class, 'mealId');

    } // end function



    public function sauces()
    {

        return $this->hasMany(MealSauce::class, 'mealId');

    } // end function




    public function drinks()
    {

        return $this->hasMany(MealDrink::class, 'mealId');

    } // end function













    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($macroType)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;






        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get();



        // loop - meal ingredients
        foreach ($mealIngredients as $mealIngredient) {


            // 1.2: ingredient
            $totalCalories += $mealIngredient->ingredient?->freshMacro()?->calories ?? 0;
            $totalProteins += $mealIngredient->ingredient?->freshMacro()?->proteins ?? 0;
            $totalCarbs += $mealIngredient->ingredient?->freshMacro()?->carbs ?? 0;
            $totalFats += $mealIngredient->ingredient?->freshMacro()?->fats ?? 0;


        } // end loop











        // :: return targetMacro
        if ($macroType == 'Calories')
            $targetMacro = $totalCalories;
        elseif ($macroType == 'Proteins')
            $targetMacro = $totalProteins;
        elseif ($macroType == 'Carbs')
            $targetMacro = $totalCarbs;
        elseif ($macroType == 'Fats')
            $targetMacro = $totalFats;


        return round($targetMacro, 2);

    } // end function








} // end model
