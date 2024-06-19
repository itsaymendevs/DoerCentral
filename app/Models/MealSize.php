<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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















        return $ingredientsWithGrams;




    } // end function








} // end model
