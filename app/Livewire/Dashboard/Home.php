<?php

namespace App\Livewire\Dashboard;

use App\Models\City;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\MealType;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{



    use HelperTrait;


    // :: variables
    public $scheduleDate;







    public function mount()
    {


        // 1: getDate
        $this->scheduleDate = $this->getNextDate();


    } // end function











    // ----------------------------------------------------------








    public function manageUnassigned($id)
    {




        // 1: makeSession
        Session::put('customerScheduleDate', $this->scheduleDate);




        // 1.2: redirect
        return $this->redirect(route('dashboard.singleCustomerMenu', [$id]), navigate: false);



    } // end function












    // ----------------------------------------------------------








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



        // 3: validation
        $this->scheduleDate == '' ? $this->scheduleDate = $this->getNextDate() : $this->scheduleDate;




        // 3.1: unAssigned scheduleMeals
        $schedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->scheduleDate)?->pluck('id')?->toArray() ?? [];

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










        // ------------------------------------------------
        // ------------------------------------------------






        // 5: scheduleMealsChart
        $scheduleMealsByType = [];
        $mealTypes = MealType::all()->pluck('shortName')->toArray();


        // 5.1: scheduleMeals
        $todaySchedules = CustomerSubscriptionSchedule::where('scheduleDate', $this->getCurrentDate())
                ?->pluck('id')?->toArray() ?? [];

        $todayScheduleMeals = CustomerSubscriptionScheduleMeal::orderBy('mealTypeId')
                ?->whereIn('subscriptionScheduleId', $todaySchedules)->get();







        // 5.2: loop - initValues
        foreach ($mealTypes as $mealType) {

            $scheduleMealsByType[$mealType] = 0;

        } // end loop







        // 5.3: loop - todayScheduleMeals
        foreach ($todayScheduleMeals?->groupBy('mealTypeId') ?? [] as $commonMealType => $todayScheduleMealsByType) {

            $scheduleMealsByType[$todayScheduleMealsByType?->first()?->mealType?->shortName] =
                $todayScheduleMealsByType->count() ?? 0;

        } // end loop - deliveries










        return view('livewire.dashboard.home', compact('customers', 'subscriptions', 'todaySubscriptions', 'plans', 'unAssignedScheduleMeals', 'cities', 'cityDeliveries', 'todayDeliveries', 'mealTypes', 'todayScheduleMeals', 'scheduleMealsByType'));




    } // end function










} // end class
