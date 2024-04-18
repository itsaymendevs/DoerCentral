<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class PlanBundle extends Model
{
    use HasFactory;



    public function types()
    {

        return $this->hasMany(PlanBundleType::class, 'planBundleId');

    } // end function



    public function days()
    {

        return $this->hasMany(PlanBundleDay::class, 'planBundleId');

    } // end function




    public function rangesByPrice()
    {

        return $this->hasMany(PlanBundleRangePrice::class, 'planBundleId');

    } // end function



    public function ranges()
    {

        return $this->hasMany(PlanBundleRange::class, 'planBundleId');

    } // end function













    // -----------------------------------------------------------
    // -----------------------------------------------------------








    public function typesInArray()
    {


        // 1: getTypes - typeInArray
        $typesInArray = [];
        $types = $this->types()->get();



        // :: loop - types
        foreach ($types->groupBy('typeId') as $commonType => $typesByType) {


            // 1.2: quantity > 0
            if ($typesByType->sum('quantity') > 0) {


                // 1.3: getTypeName
                $typeName = $typesByType->first()->type->name == 'Recipe' ? 'Meal' : $typesByType->first()->type->name;


                array_push($typesInArray, "{$typesByType->sum('quantity')} {$typeName}");


            } // end if


        } // end loop - types







        return $typesInArray;


    } // end function





} // end model
