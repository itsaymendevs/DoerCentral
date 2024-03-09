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







} // end model
