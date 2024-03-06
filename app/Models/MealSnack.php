<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealSnack extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function snack()
    {

        return $this->belongsTo(Meal::class, 'snackId');

    } // end function





} // end model
