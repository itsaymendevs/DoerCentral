<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionScheduleMeal extends Model
{
    use HasFactory;




    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function





    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function






    public function schedule()
    {

        return $this->belongsTo(CustomerSubscriptionSchedule::class, 'subscriptionScheduleId');

    } // end function




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function








    public function size()
    {

        return $this->belongsTo(Size::class, 'sizeId');

    } // end function












    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------










    public function mealSize()
    {



        // 1: getMealSize
        $mealSize = MealSize::where('mealId', $this?->mealId)
            ->where('sizeId', $this?->sizeId)?->first();



        return $mealSize;

    } // end function










} // end model
