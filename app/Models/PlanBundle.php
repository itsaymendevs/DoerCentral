<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundle extends Model
{
    use HasFactory;



    public function types()
    {

        return $this->hasMany(PlanBundleType::class, 'planBundleId');

    } // end function




    public function ranges()
    {

        return $this->hasMany(PlanBundleRangePrice::class, 'planBundleId');

    } // end function




} // end model
