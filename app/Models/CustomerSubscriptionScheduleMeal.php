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





} // end model
