<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;





    public function subscriptions()
    {


        return $this->hasMany(CustomerSubscription::class, 'customerId');


    } // end function







    // ----------------------------------------
    // ----------------------------------------








    public function latestPlan()
    {


        // 1: getLatestSubscriptions
        $subscription = $this->subscriptions()?->latest()?->first();





        // 1.2: getPlan
        $latestPlan = $subscription ? $subscription->plan : null;

        return $latestPlan;







    } // end function


} // end model
