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






    public function group()
    {

        return $this->belongsTo(IngredientGroup::class, 'groupId');

    } // end function







    public function category()
    {

        return $this->belongsTo(IngredientCategory::class, 'categoryId');

    } // end function








    public function unit()
    {

        return $this->belongsTo(Unit::class, 'unitId');

    } // end function







    public function purchaseUnit()
    {

        return $this->belongsTo(Unit::class, 'purchaseUnitId', 'id');

    } // end function






    public function freshMacro()
    {

        return $this->macros?->where('ingredientType', 'Fresh')->first();

    } // end function






    public function meals()
    {

        return $this->hasMany(MealIngredient::class, 'ingredientId');


    } // end function







} // end function
