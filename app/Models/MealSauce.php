<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealSauce extends Model
{
    use HasFactory;


    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function sauce()
    {

        return $this->belongsTo(Meal::class, 'sauceId');

    } // end function



} // end model
