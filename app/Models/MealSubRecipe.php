<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealSubRecipe extends Model
{
    use HasFactory;


    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function



    public function subRecipe()
    {

        return $this->belongsTo(Meal::class, 'subRecipeId');

    } // end function





} // end model



