<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleRangeType extends Model
{
    use HasFactory;



    public function bundleRange()
    {

        return $this->belongsTo(PlanBundleRange::class, 'planBundleRangeId');

    } // end function




    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function






} // end model
