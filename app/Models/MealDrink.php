<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealDrink extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function drink()
    {

        return $this->belongsTo(Meal::class, 'drinkId');

    } // end function




} // end model




