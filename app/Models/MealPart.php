<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

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















    // ------------------------------------------









    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalGrams = $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: getPart
        $part = $this->part()->first();



        // 1.2: MacroHelper
        $partMacro = $part ? $this->getMacro($part, $currentAmount) : [];








        // :: create instance
        $totalMacros = new stdClass();

        $totalMacros->calories = round($partMacro[1] ?? 0, 2);
        $totalMacros->proteins = round($partMacro[2] ?? 0, 2);
        $totalMacros->carbs = round($partMacro[3] ?? 0, 2);
        $totalMacros->fats = round($partMacro[4] ?? 0, 2);





        return $totalMacros;


    } // end function






} // end model
