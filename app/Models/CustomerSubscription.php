<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{
    use HasFactory;




    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function






    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function





    public function range()
    {

        return $this->belongsTo(PlanRange::class, 'planRangeId');

    } // end function






    public function bag()
    {

        return $this->belongsTo(Bag::class, 'bagId');

    } // end function




} // end model
