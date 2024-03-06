<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;


    public function macros()
    {

        return $this->hasMany(IngredientMacro::class, 'ingredientId');

    } // end function




    public function freshMacro()
    {

        return $this->macros?->where('ingredientType', 'Fresh')->first();

    } // end function





} // end function
