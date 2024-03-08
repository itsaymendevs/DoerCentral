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






    public function itemsInArray()
    {


        // :: items
        $items = [];



        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get();

        foreach ($mealIngredients?->unique('mealId') as $mealIngredient)
            if ($mealIngredient?->ingredient)
                array_push($items, $mealIngredient->ingredient->name);






        // 2: subRecipes
        $mealSubRecipes = $this->subRecipes()?->get();

        foreach ($mealSubRecipes?->unique('mealId') as $mealSubRecipe)
            if ($mealSubRecipe?->subRecipe)
                array_push($items, $mealSubRecipe->subRecipe->name);






        // 3: sauces
        $mealSauces = $this->sauces()?->get();

        foreach ($mealSauces?->unique('mealId') as $mealSauce)
            if ($mealSauce?->sauce)
                array_push($items, $mealSauce->sauce->name);






        // 4: snacks
        $mealSnacks = $this->snacks()?->get();

        foreach ($mealSnacks?->unique('mealId') as $mealSnack)
            if ($mealSnack?->snack)
                array_push($items, $mealSnack->snack->name);







        // 5: side
        $mealSides = $this->sides()?->get();

        foreach ($mealSides?->unique('mealId') as $mealSide)
            if ($mealSide?->side)
                array_push($items, $mealSide->side->name);





        // 6: drink
        $mealDrinks = $this->sides()?->get();

        foreach ($mealDrinks?->unique('mealId') as $mealDrink)
            if ($mealDrink?->drink)
                array_push($items, $mealDrink->drink->name);






        return count($items) > 0 ? $items : ['List is empty'];



    } // end function






} // end model
