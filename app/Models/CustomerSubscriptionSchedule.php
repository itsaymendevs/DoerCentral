<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionSchedule extends Model
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





    public function meals()
    {

        return $this->hasMany(CustomerSubscriptionScheduleMeal::class, 'subscriptionScheduleId', 'id');

    } // end function

} // end model
