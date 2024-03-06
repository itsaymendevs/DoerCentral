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




    public function subRecipes()
    {

        return $this->hasMany(MealSubRecipe::class, 'mealSizeId');

    } // end function






    public function snacks()
    {

        return $this->hasMany(MealSnack::class, 'mealSizeId');

    } // end function




    public function sides()
    {

        return $this->hasMany(MealSide::class, 'mealSizeId');

    } // end function



    public function sauces()
    {

        return $this->hasMany(MealSauce::class, 'mealSizeId');

    } // end function




    public function drinks()
    {

        return $this->hasMany(MealDrink::class, 'mealSizeId');

    } // end function



} // end model
