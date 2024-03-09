<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPart extends Model
{
    use HasFactory;
    use MacroTrait;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function part()
    {

        return $this->belongsTo(Meal::class, 'partId');

    } // end function





    public function type()
    {

        return $this->belongsTo(Type::class, 'typeId');

    } // end function







    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: drink (Meal)
        $drink = $this->drink()->first();
        $amount = $currentAmount; // currentAmount - upToDateAmount



        // 1.2: MacroHelper - getMacro - RECURSION
        $drinkMacros = $drink ? $this->getMacro($drink->id, $drink->type, $amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats) : [];






        // :: create instance - amountUsedOutside because its not applied in getMacros initial
        $totalMacros = new stdClass();


        $totalMacros->calories = round($drinkMacros[0], 2) ?? 0;
        $totalMacros->proteins = round($drinkMacros[1], 2) ?? 0;
        $totalMacros->carbs = round($drinkMacros[2], 2) ?? 0;
        $totalMacros->fats = round($drinkMacros[3], 2) ?? 0;





        return $totalMacros;


    } // end function






} // end model
