<?php

namespace App\Livewire\Dashboard;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Component;

class Home extends Component
{



    use HelperTrait;





    public function render()
    {



        // 1: dependencies
        $plans = Plan::all();
        $customers = Customer::whereHas('subscriptions')->get();
        $subscriptions = CustomerSubscription::whereIn('customerId', $customers?->pluck('id')?->toArray() ?? [])->get();








        // ----------------------------------------------
        // ----------------------------------------------





        // 1.2: todaySubscriptions
        $todaySubscriptions = CustomerSubscription::whereIn('customerId', $customers?->pluck('id')?->toArray() ?? [])->where('created_at', 'LIKE', '%' . date('Y-m-d') . '%')->get();





        // 1.2: collectedBags
        $totalBags = 0;
        $totalRefundedBags = 0;
        $totalBagsBalance = 0;




        $subscriptionDeliveries = CustomerSubscriptionDelivery::whereIn('customerId', $customers?->pluck('id')?->toArray() ?? [])->get();


        foreach ($subscriptionDeliveries->groupBy('customerSubscriptionId') as $commonSubscription => $subscriptionDelivery) {



            // :: bagPrice
            $currentBagPrice = $subscriptionDelivery->first()->subscription->bagPrice;

            // 1.3: totalCollected - totalBags
            $subscriptionDelivery->first()->isBagCollected ? $totalRefundedBags += doubleval($currentBagPrice) : null;
            $totalBags += doubleval($currentBagPrice);




        } // end loop












        // ----------------------------------------------
        // ----------------------------------------------





        // 3: unAssigned scheduleMeals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', '2024-07-11')?->pluck('id')?->toArray() ?? [];

        $unAssignedScheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('subscriptionScheduleId', $schedules)?->whereNull('mealId')?->get();












        return view('livewire.dashboard.home', compact('customers', 'subscriptions', 'todaySubscriptions', 'totalBags', 'totalRefundedBags', 'totalBagsBalance', 'plans', 'unAssignedScheduleMeals'));


    } // end function



} // end class
