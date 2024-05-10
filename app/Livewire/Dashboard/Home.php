<?php

namespace App\Livewire\Dashboard;

use App\Models\City;
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
        $subscriptions = CustomerSubscription::with('bagRefund')
            ->whereIn('customerId', $customers?->pluck('id')?->toArray() ?? [])->get();







        // ----------------------------------------------
        // ----------------------------------------------





        // 1.2: todaySubscriptions
        $todaySubscriptions = CustomerSubscription::with('bagRefund')
            ->whereIn('customerId', $customers?->pluck('id')?->toArray() ?? [])
            ->where('created_at', 'LIKE', '%' . $this->getCurrentDate() . '%')->get();








        // ----------------------------------------------
        // ----------------------------------------------





        // 3: unAssigned scheduleMeals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->getNextDate())?->pluck('id')?->toArray() ?? [];

        $unAssignedScheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('subscriptionScheduleId', $schedules)?->whereNull('mealId')?->get();







        // ------------------------------------------------
        // ------------------------------------------------




        // 4: deliveryCharts
        $cityDeliveries = [];
        $cities = City::all()->pluck('name')->toArray();
        $todayDeliveries = CustomerSubscriptionDelivery::where('deliveryDate', $this->getCurrentDate())->get();





        // 4.1: loop - deliveries
        foreach ($todayDeliveries ?? [] as $delivery) {


            if ($delivery?->customer?->addressByDay($delivery->deliveryDate)?->city?->name)
                $cityDeliveries[$delivery?->customer?->addressByDay($delivery->deliveryDate)?->city?->name] = ($cityDeliveries[$delivery?->customer?->addressByDay($delivery->deliveryDate)?->city?->name] ?? 0) + 1;


        } // end loop - deliveries










        return view('livewire.dashboard.home', compact('customers', 'subscriptions', 'todaySubscriptions', 'plans', 'unAssignedScheduleMeals', 'cities', 'cityDeliveries', 'todayDeliveries'));




    } // end function



} // end class
