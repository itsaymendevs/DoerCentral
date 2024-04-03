<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    public function ranges()
    {

        return $this->hasMany(PlanRange::class, 'planId');

    } // end function




    public function bundles()
    {

        return $this->hasMany(PlanBundle::class, 'planId');

    } // end function






    public function calendars()
    {

        return $this->hasMany(MenuCalendarPlan::class, 'planId');

    } // end function





    public function defaultCalendarRelation()
    {

        return $this->calendars()->where('isDefault', true);


    } // end function










    public function defaultCalendar()
    {

        return $this->calendars()->where('isDefault', true)?->first();


    } // end function







} // end model
