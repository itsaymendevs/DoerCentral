<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealSide extends Model
{
    use HasFactory;


    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function



    public function side()
    {

        return $this->belongsTo(Meal::class, 'sideId');

    } // end function




} // end model



