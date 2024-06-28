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







    public function suppliers()
    {

        return $this->hasMany(SupplierIngredient::class, 'ingredientId');

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








    public function stocks()
    {

        return $this->hasMany(Stock::class, 'ingredientId');


    } // end function








    // -------------------------------------------------
    // -------------------------------------------------
    // -------------------------------------------------
    // -------------------------------------------------




    public function getWastage()
    {


        // 1: getWastage
        return doubleval(($this->wastage ?? 0) / 100);




    } // end function





    public function availableQuantity()
    {



        // 1: get stocks
        $totalQuantity = $this->stocks()->sum('availableQuantity');



        dd($totalQuantity);

        return $totalQuantity ?? 0;




    } // end function







    // -------------------------------------------------






    public function latestPrice()
    {



        // 1: get stocks
        $latestPrice = $this->stocks()?->orderBy('created_at', 'desc')?->first()?->buyPrice;

        return $latestPrice ?? 0;




    } // end function









    // -------------------------------------------------






    public function latestPricePerGram()
    {



        // 1: get stocks
        $latestPrice = $this->stocks()?->orderBy('created_at', 'desc')?->first()?->buyPrice;

        return $latestPrice ? doubleval($latestPrice) / 1000 : 0;




    } // end function






} // end function
