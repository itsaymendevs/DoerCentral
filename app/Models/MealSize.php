<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSize extends Model
{
    use HasFactory;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function





    public function size()
    {

        return $this->belongsTo(Size::class, 'sizeId');

    } // end function





    // ------------------------------------------




    public function ingredients()
    {

        return $this->hasMany(MealIngredient::class, 'mealSizeId');

    } // end function




    public function parts()
    {

        return $this->hasMany(MealPart::class, 'mealSizeId');

    } // end function












    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // ---------------------------------------------------------





    public function totalGrams()
    {

        // :: root
        $totalGrams = 0;
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        foreach ($ingredients ?? [] as $mealIngredient) {


            $totalGrams += $mealIngredient?->amount ?? 0;

        } // end loop





        // 2: parts
        foreach ($parts ?? [] as $mealPart) {


            $totalGrams += $mealPart?->amount ?? 0;

        } // end loop







        return $totalGrams;




    } // end function









    // ----------------------------------------------------------
    // ----------------------------------------------------------








    public function ingredientsWithGrams()
    {


        // :: root
        $ingredientsWithGrams = [];
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        foreach ($ingredients ?? [] as $mealIngredient) {


            $ingredientsWithGrams[$mealIngredient->ingredientId] = ($ingredientsWithGrams[$mealIngredient->ingredientId] ?? 0) + $mealIngredient?->amount ?? 0;


        } // end loop








        // 2: parts
        foreach ($parts ?? [] as $mealPart) {



            // 2.1: recursive
            $partIngredientsWithGrams = $mealPart->ingredientsWithGrams($mealPart->amount);




            // 2.2: merge
            $ingredientsWithGrams = $ingredientsWithGrams + $partIngredientsWithGrams;



        } // end loop










        return $ingredientsWithGrams;




    } // end function








    // ----------------------------------------------------------
    // ----------------------------------------------------------








    public function contentWithGrams($numberOfMeals = 1)
    {


        // :: root
        $partsWithGrams = [];
        $parts = $this->parts()->get();

        $ingredientsWithGrams = [];
        $ingredients = $this->ingredients()->get();








        // 1: ingredients
        foreach ($ingredients ?? [] as $mealIngredient) {


            $ingredientsWithGrams[$mealIngredient->ingredientId] = (($ingredientsWithGrams[$mealIngredient->ingredientId] ?? 0) + ($mealIngredient?->amount ?? 0)) * $numberOfMeals;


        } // end loop








        // 2: parts
        foreach ($parts ?? [] as $mealPart) {


            $partsWithGrams[$mealPart->partId] = (($partsWithGrams[$mealPart->partId] ?? 0) + ($mealPart?->amount ?? 0)) * $numberOfMeals;


        } // end loop









        // 3: create instance
        $instance = new stdClass();

        $instance->partsWithGrams = $partsWithGrams;
        $instance->ingredientsWithGrams = $ingredientsWithGrams;




        return $instance;




    } // end function









} // end model
